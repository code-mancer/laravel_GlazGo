<?php

namespace App\Services\Auth\Actions;

use App\infrastructure\Action\BaseAction;
use App\Models\User;
use App\Services\Auth\DTO\RegisterDTO;
use App\Services\Auth\Exceptions\UserNotRegisteredException;

class RegisterAction extends BaseAction
{
    /**
     * @throws UserNotRegisteredException
     */
    public function run(RegisterDTO $DTO): bool
    {
        $user = User::createUser($DTO);

        if (!$user->save()) {
            throw new UserNotRegisteredException();
        }

        return true;
    }
}
