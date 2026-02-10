<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Public\ContactRequest;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request)
    {
        // If you don't use activity log package in this separate project, replace with Log::info(...)
        if (function_exists('activity')) {
            activity('public_contact')
                ->withProperties([
                    'payload' => $request->safe()->toArray(),
                    'ip' => $request->ip(),
                    'user_agent' => (string) $request->userAgent(),
                ])
                ->log('Website contact form submitted');
        }

        return response()->json([
            'message' => 'Thanks. We received your request and will contact you soon.',
        ]);
    }
}
