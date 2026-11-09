<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('student')?->id;

        return [
            'registration_number' => ['required', 'string', 'max:255', Rule::unique('students')->ignore($id)],
            'name'                => ['required', 'string', 'max:255'],
            'email'               => ['required', 'email', Rule::unique('students')->ignore($id)],
        ];
    }
}