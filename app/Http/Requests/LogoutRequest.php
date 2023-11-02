<?php

namespace App\Http\Requests;

use App\infrastructure\BaseRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogoutRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [];
    }
}
