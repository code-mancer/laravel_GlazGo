<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class LogoutRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
