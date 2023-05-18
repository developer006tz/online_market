<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageUpdateRequest extends FormRequest
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
            'conversation_id' => ['nullable', 'exists:conversations,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'body' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'file' => ['nullable', 'file'],
        ];
    }
}
