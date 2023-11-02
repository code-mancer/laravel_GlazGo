<?php

namespace App\Services\Auth\DTO;

use App\Http\Requests\LoginRequest;
use App\infrastructure\DTO\BaseDTO;

class LoginDto extends BaseDTO
{
    public string $email;
    public string $password;

    static public function fromRequest(LoginRequest $request): self
    {
        return self::from([
            'email' =>$request->getEmail(),
            'password' => $request->getPassword(),
        ]);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
