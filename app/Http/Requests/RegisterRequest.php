<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public const EMAIL = 'email';
    public const PASSWORD = 'password';
    public const PASSWORD_CONFIRMATION = 'password_confirmation';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::EMAIL => [
                'email',
                'required',
            ],
            self::PASSWORD_CONFIRMATION => [
                'string',
                'required',
            ],
            self::PASSWORD => [
                'string',
                'required',
                'min:6',
                'confirmed'
            ],
        ];
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
