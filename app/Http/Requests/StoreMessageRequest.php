<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|array|min:1', // Must be an array with at least one user
            'user_id.*' => 'required|exists:users,id', // Each ID must exist in the users table
            'recipient_type' => 'required|in:student,parent,teacher', // Ensure recipient type is valid
        ];
    }
}
