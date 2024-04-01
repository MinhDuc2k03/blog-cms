<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' =>['required', 'string', 'max:255'],
            'slug' =>['unique'],
            'category' => ['required', 'string', 'exists:categories,name', 'max:255'],
            'post' => ['required'],
        ];
    }

    public function messages() {
        return [
            'category.required' => 'The category field is required',
            'category.exists' => 'The category field does not exist',
        ];
    }
}
