<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user),
                'email',
            ],
            'phone' => ['nullable', 'max:255', 'string'],
            'photo' => ['nullable', 'file'],
            'password' => ['nullable'],
            'location' => ['nullable', 'max:255', 'string'],
            'status' => ['required', 'in:active,disabled'],
            'roles' => 'array',
        ];
    }
}
