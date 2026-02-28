<?php

namespace App\Http\Requests\Api\V1\Public;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['required', 'string', 'max:191'],
            'contact_name' => ['required', 'string', 'max:191'],
            'contact_email' => ['required', 'email', 'max:191'],
            'contact_phone' => ['nullable', 'string', 'max:50'],
            'tenant_type' => ['nullable', Rule::in(['sme', 'ngo'])],
            'requested_plan_code' => ['nullable', 'string', 'max:50'],
            'preferred_users' => ['nullable', 'integer', 'min:1', 'max:200000'],
            'billing_cycle' => ['nullable', Rule::in(['monthly', 'yearly', 'custom'])],
            'requested_modules' => ['nullable', 'array'],
            'requested_modules.*' => ['string', 'max:100'],
            'message' => ['nullable', 'string', 'max:5000'],
            'metadata' => ['nullable', 'array'],
        ];
    }
}

