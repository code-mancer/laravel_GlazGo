<?php

namespace App\Services\Auth\Exceptions;

use App\infrastructure\Exceptions\BusinessLogicException;

class UserNotFoundException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return self::NOT_FOUND;
    }

    public function getStatusMessage(): string
    {
        return 'User not found';
    }
}
