<?php

namespace App\Services\Auth\Exceptions;

use App\infrastructure\Exceptions\BusinessLogicException;

class OauthClientNotFoundException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return self::NOT_FOUND;
    }

    public function getStatusMessage(): string
    {
        return 'Oauth client not found error exception';
    }
}
