<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CurriculumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'file-upload.max' => 'Max file size exceeded',
            '*.required' => 'This field is required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'phone' => ['required', 'integer'],
            'desired-job' => ['required', 'string', 'max:500'],
            'schooling' => ['required', 'string', 'max:250'],
            'observations' => ['nullable'],
            'file-upload' => ['required', 'file' , 'max:1024', 'mimes:doc,docx,pdf'],
        ];
    }
}
