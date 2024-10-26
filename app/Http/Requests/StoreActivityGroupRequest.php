<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreActivityGroupRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:To Do,In Progress,Done' // enum values for status
        ];
    }

    /**
     * Customize the error messages for validation failures.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'status.in' => 'The status must be one of: To Do, In Progress, or Done.'
        ];
    }
}
