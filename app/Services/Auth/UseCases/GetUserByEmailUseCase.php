<?php

namespace App\Services\Auth\UseCases;

use App\infrastructure\UseCase\BaseUseCase;
use App\Models\User;
use App\Services\Auth\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\Builder;

class GetUserByEmailUseCase extends BaseUseCase
{
    /**
     * @throws UserNotFoundException
     */
    public function run(string $email): User
    {
        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
