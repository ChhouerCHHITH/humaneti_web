<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Services\PublicSubscriptionGateway;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RuntimeException;

class SubscriptionPlanController extends Controller
{
    public function __invoke(Request $request, PublicSubscriptionGateway $gateway): JsonResponse
    {
        try {
            $payload = $gateway->listPlans($request->query('tenant_type'));
            return response()->json($payload);
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

