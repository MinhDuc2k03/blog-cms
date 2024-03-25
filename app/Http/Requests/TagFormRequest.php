<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:tags', 'max:255'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'The name field is required',
            'name.unique' => 'The name field must be unique',
        ];
    }
}
