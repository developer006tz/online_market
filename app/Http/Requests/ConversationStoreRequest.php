<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConversationStoreRequest extends FormRequest
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
            'post_id' => ['required', 'exists:posts,id'],
            'seller_id' => ['required', 'exists:users,id'],
            'customer_id' => ['required', 'max:255'],
        ];
    }
}
