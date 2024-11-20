<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'assignment_name' => 'required|string|max:255',
            'grade' => 'required|numeric|min:0|max:10',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ];
    }
}
