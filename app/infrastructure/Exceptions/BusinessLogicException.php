<?php

namespace App\infrastructure\Exceptions;

use Exception;

abstract class BusinessLogicException extends Exception
{
    public const SERVER_ERROR = 500;
    public const NOT_FOUND = 404;

    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;
}
