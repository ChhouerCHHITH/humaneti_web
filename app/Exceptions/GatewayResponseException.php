<?php

namespace App\Exceptions;

use RuntimeException;

/**
 * Thrown when the upstream SaaS gateway returns a non-2xx response.
 * Carries the full decoded response body so controllers can forward
 * field-level validation errors (e.g. the SaaS returns 422 + errors).
 */
class GatewayResponseException extends RuntimeException
{
    private array $responseData;

    public function __construct(string $message, int $code, array $responseData = [])
    {
        parent::__construct($message, $code);
        $this->responseData = $responseData;
    }

    public function getResponseData(): array
    {
        return $this->responseData;
    }
}
