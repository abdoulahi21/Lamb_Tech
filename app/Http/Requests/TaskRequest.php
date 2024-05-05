<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string',
            'completed' => 'nullable|boolean',
            'teacher_id' => 'required|exists:profiles,id',
            'schoolClass_id' => 'required|exists:school_classes,id',
            'exo_file' => 'nullable|file',
            'correction_file' => 'nullable|file',
            'rendu_file' => 'nullable|file',
        ];
    }
}
