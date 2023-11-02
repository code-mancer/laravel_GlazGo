<?php

namespace App\Services\Auth\DTO;

use App\Http\Requests\RegisterRequest;
use App\infrastructure\DTO\BaseDTO;

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
