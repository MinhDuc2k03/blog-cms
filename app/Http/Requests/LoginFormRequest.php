<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'exists:users,email', 'max:255'],
            'password' => ['required'],
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Email is required.',
            'email.exists' => 'Email does not exist.',
            'password.required' => 'Password is required.',
        ];
    }
}
