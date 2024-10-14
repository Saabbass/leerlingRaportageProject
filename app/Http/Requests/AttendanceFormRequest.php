<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceFormRequest extends FormRequest
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
            'user_id'    => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'date'       => 'required|date',
            'status'     => 'required|string|in:present,absent,late',
            'reason'     => 'nullable|string|max:255',
        ];
    }
}
