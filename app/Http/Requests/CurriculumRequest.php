<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculumRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            '_value.name' => ['required', 'string', 'max:250'],
            '_value.email' => ['required', 'email:rfc', 'max:150'],
            '_value.phone' => ['required', 'integer'],
            '_value.desired_job' => ['required', 'string', 'max:500'],
            '_value.schooling' => ['required', 'string', 'max:250'],
            '_value.observations' => ['nullable'],
            '_value.document' => ['required', 'file|lte:1024', 'mimes:doc, docx, pdf'],
        ];
    }
}
