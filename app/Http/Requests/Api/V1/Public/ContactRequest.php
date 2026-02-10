<?php

namespace App\Http\Requests\Api\V1\Public;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Public endpoint
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:120'],
            'email' => ['required','email','max:190'],
            'company' => ['nullable','string','max:190'],
            'phone' => ['nullable','string','max:40'],
            'message' => ['required','string','max:2000'],
        ];
    }
}
