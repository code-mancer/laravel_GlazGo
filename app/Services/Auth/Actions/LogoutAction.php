<?php

namespace App\Services\Auth\Actions;

use App\infrastructure\Action\BaseAction;
use App\Models\User;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\TokenRepository;

class LogoutAction extends BaseAction
{
    public function run(User $user): bool
    {
        $token = $user->currentAccessToken();

        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);

        return
            $tokenRepository->revokeAccessToken($token->id)
            && $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($token->id);
    }
}
