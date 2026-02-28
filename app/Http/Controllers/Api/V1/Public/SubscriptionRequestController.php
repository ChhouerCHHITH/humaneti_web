<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Public\StoreSubscriptionRequest;
use App\Services\PublicSubscriptionGateway;
use Illuminate\Http\JsonResponse;
use RuntimeException;

class SubscriptionRequestController extends Controller
{
    public function __invoke(StoreSubscriptionRequest $request, PublicSubscriptionGateway $gateway): JsonResponse
    {
        $payload = $request->validated();
        $payload['source'] = 'humaneti_web';
        $payload['metadata'] = array_merge(
            is_array($payload['metadata'] ?? null) ? $payload['metadata'] : [],
            [
                'ip' => $request->ip(),
                'user_agent' => (string) $request->userAgent(),
                'website_locale' => (string) $request->header('X-Locale', 'en'),
                'website_url' => (string) $request->fullUrl(),
            ],
        );

        try {
            $response = $gateway->createRequest($payload);
            $status = isset($response['data']) ? 201 : 200;

            return response()->json($response, $status);
        } catch (RuntimeException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $this->statusFromException($e));
        }
    }

    private function statusFromException(RuntimeException $e): int
    {
        $status = $e->getCode();
        return is_int($status) && $status >= 400 && $status <= 599 ? $status : 502;
    }
}

