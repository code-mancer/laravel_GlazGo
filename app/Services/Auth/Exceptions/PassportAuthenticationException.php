<?php

namespace App\Services\Auth\Exceptions;

use App\infrastructure\Exceptions\BusinessLogicException;

class PassportAuthenticationException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return 'Passport authentication exception';
    }
}
