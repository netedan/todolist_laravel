<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'task_name' => 'required|string|max:255',
            'task_status' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'executor_id' => 'required|integer',
            'project_id' => 'required|integer|exists:projects,id',
            'tag_id' => 'nullable|integer',
            'due_date' => 'nullable|date',
        ];
    }
}
