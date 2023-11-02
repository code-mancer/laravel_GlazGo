<?php

namespace App\Services\Auth\DTO;

use App\Http\Requests\RegisterRequest;
use App\infrastructures\DTO\BaseDTO;

class RegisterDTO extends BaseDTO
{
    public string $email;
    public string $password;

    static public function fromRequest(RegisterRequest $request): self
    {
        return self::from([
            'email' =>$request->getEmail(),
            'password' => $request->getPassword(),
        ]);
    }
}
