<?php

namespace App\Services\Auth\Exceptions;

use App\infrastructures\Exceptions\BusinessLogicException;

class UserNotRegisteredException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return 'User registration error';
    }
}
