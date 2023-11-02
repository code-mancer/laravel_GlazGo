<?php

namespace App\infrastructure;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

abstract class BaseRequest extends FormRequest
{
    public function getUserData(): User
    {
        return Auth::user();
    }
}
