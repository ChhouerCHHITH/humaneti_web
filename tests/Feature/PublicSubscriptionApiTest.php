<?php

namespace Tests\Feature;

use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Routing\Middleware\ThrottleRequestsWithRedis;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PublicSubscriptionApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Prevent CI flakiness from route-level throttle middleware.
        $this->withoutMiddleware([
            ThrottleRequests::class,
            ThrottleRequestsWithRedis::class,
        ]);
    }

    public function test_it_proxies_public_subscription_plans(): void
    {
        config()->set('services.humaneti_sass.base_url', 'http://sass.test');
        config()->set('services.humaneti_sass.subscription_public_token', 'public-token');

        Http::fake([
            'http://sass.test/api/v1/public/subscription-plans*' => Http::response([
                'success' => true,
                'data' => [
                    ['id' => 1, 'code' => 'STARTER', 'name' => 'Starter'],
                ],
            ], 200),
        ]);

        $response = $this->getJson('/api/v1/public/subscription-plans?tenant_type=ngo');

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.0.code', 'STARTER');

        Http::assertSent(function ($request): bool {
            return $request->url() === 'http://sass.test/api/v1/public/subscription-plans?tenant_type=ngo'
                && $request->header('X-Subscription-Public-Token')[0] === 'public-token';
        });
    }

    public function test_it_validates_subscription_request_payload(): void
    {
        config()->set('services.humaneti_sass.base_url', 'http://sass.test');
        Http::fake();

        $response = $this->postJson('/api/v1/public/subscription-requests', []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['company_name', 'contact_name', 'contact_email']);

        Http::assertNothingSent();
    }

    public function test_it_proxies_subscription_request_submission(): void
    {
        config()->set('services.humaneti_sass.base_url', 'http://sass.test');
        config()->set('services.humaneti_sass.subscription_public_token', 'public-token');

        Http::fake([
            'http://sass.test/api/v1/public/subscription-requests' => Http::response([
                'success' => true,
                'message' => 'Subscription request received successfully.',
                'data' => [
                    'id' => 12,
                    'uuid' => '2d3f7702-d4e8-4f8d-b2bf-2a3b0427c8ca',
                    'status' => 'new',
                ],
            ], 201),
        ]);

        $payload = [
            'company_name' => 'Humaneti NGO',
            'contact_name' => 'Admin User',
            'contact_email' => 'admin@example.com',
            'contact_phone' => '012345678',
            'tenant_type' => 'ngo',
            'requested_plan_code' => 'BUSINESS',
            'preferred_users' => 80,
            'billing_cycle' => 'yearly',
            'requested_modules' => ['payroll', 'projects'],
            'message' => 'Please contact us.',
        ];

        $response = $this->postJson('/api/v1/public/subscription-requests', $payload);

        $response->assertCreated()
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.status', 'new');

        Http::assertSent(function ($request): bool {
            $data = $request->data();

            return $request->url() === 'http://sass.test/api/v1/public/subscription-requests'
                && $request->method() === 'POST'
                && $request->header('X-Subscription-Public-Token')[0] === 'public-token'
                && ($data['source'] ?? null) === 'humaneti_web'
                && ($data['company_name'] ?? null) === 'Humaneti NGO'
                && isset($data['metadata']['ip']);
        });
    }
}
