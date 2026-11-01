<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
     
    public function authorize(): bool
    {
        return true;
    }

        public function rules(): array
    {

        $courseId = $this->route('course')?->id;
        return [
            'code'        => ['required', 'string', 'max:20', Rule::unique('courses', 'code')->ignore($courseId)],
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'credits'     => ['required', 'integer', 'min:1', 'max:10'],
            'lecturer_id' => ['nullable', 'exists:users,id'],
        ]; 

    }
  public function messages(): array
    {
        return [
            'code.unique' =>'A course with this code already exists.',
            'lecturer_id.exists' => 'The selected lecturer does not exist.',
        ];
    }

}
