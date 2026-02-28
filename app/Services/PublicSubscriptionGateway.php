<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class PublicSubscriptionGateway
{
    public function listPlans(?string $tenantType = null): array
    {
        $query = [];
        if (in_array($tenantType, ['sme', 'ngo'], true)) {
            $query['tenant_type'] = $tenantType;
        }

        try {
            $response = $this->request()->get($this->endpoint('/api/v1/public/subscription-plans'), $query);
            if ($response->failed()) {
                throw new RuntimeException($this->extractMessage($response->json()), $response->status());
            }

            $data = $response->json();
            return is_array($data) ? $data : ['success' => true, 'data' => []];
        } catch (ConnectionException $e) {
            throw new RuntimeException('Subscription service is temporarily unavailable.', 503, $e);
        } catch (RequestException $e) {
            throw new RuntimeException('Failed to fetch subscription plans.', 502, $e);
        }
    }

    public function createRequest(array $payload): array
    {
        try {
            $response = $this->request()->post($this->endpoint('/api/v1/public/subscription-requests'), $payload);
            if ($response->failed()) {
                throw new RuntimeException($this->extractMessage($response->json()), $response->status());
            }

            $data = $response->json();
            return is_array($data) ? $data : ['success' => true];
        } catch (ConnectionException $e) {
            throw new RuntimeException('Subscription service is temporarily unavailable.', 503, $e);
        } catch (RequestException $e) {
            throw new RuntimeException('Failed to submit subscription request.', 502, $e);
        }
    }

    private function request(): PendingRequest
    {
        $request = Http::acceptJson()
            ->asJson()
            ->timeout((int) config('services.humaneti_sass.http_timeout', 15))
            ->retry(1, 200);

        $token = trim((string) config('services.humaneti_sass.subscription_public_token', ''));
        if ($token !== '') {
            $request = $request->withHeader('X-Subscription-Public-Token', $token);
        }

        return $request;
    }

    private function endpoint(string $path): string
    {
        $baseUrl = rtrim((string) config('services.humaneti_sass.base_url', ''), '/');
        if ($baseUrl === '') {
            throw new RuntimeException('Subscription gateway is not configured.');
        }

        return $baseUrl.'/'.ltrim($path, '/');
    }

    private function extractMessage(mixed $payload): string
    {
        if (is_array($payload) && isset($payload['message']) && is_string($payload['message']) && $payload['message'] !== '') {
            return $payload['message'];
        }

        return 'Subscription request failed.';
    }
}

