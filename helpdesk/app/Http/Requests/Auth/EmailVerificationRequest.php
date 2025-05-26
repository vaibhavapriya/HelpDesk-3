<?php
namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
        ];
    }
}
