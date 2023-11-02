<?php

namespace App\Services\Auth\Actions;

use App\Http\Resources\CredentialResource;
use App\infrastructure\Action\BaseAction;
use App\Models\OauthClient;
use App\Services\Auth\DTO\LoginDto;
use App\Services\Auth\Exceptions\OauthClientNotFoundException;
use App\Services\Auth\Exceptions\PassportAuthenticationException;
use App\Services\Auth\Exceptions\UserNotFoundException;
use App\Services\Auth\UseCases\GetOauthClientUseCase;
use App\Services\Auth\UseCases\GetUserByEmailUseCase;
use Illuminate\Support\Facades\Http;


class LoginAction extends BaseAction
{
    protected OauthClient $oauthClient;

    public function __construct(
        protected readonly GetUserByEmailUseCase $getUserByEmailUseCase,
        protected readonly GetOauthClientUseCase $getOauthClientUseCase
    )
    {
    }

    /**
     * @throws UserNotFoundException
     * @throws OauthClientNotFoundException
     * @throws PassportAuthenticationException
     */
    public function run(LoginDto $DTO): CredentialResource
    {
        $user = $this->getUserByEmailUseCase->run($DTO->email);

        $this->oauthClient = $this->getOauthClientUseCase->run();

        $data = $this->requestToken($DTO);

        $data->user = $user;

        return new CredentialResource($data);
    }

    /**
     * @throws PassportAuthenticationException
     */
    private function requestToken(LoginDto $DTO)
    {
       $response = Http::asForm()->post(config('passport.api_url') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $this->oauthClient->id,
            'client_secret' => $this->oauthClient->secret,
            'username' => $DTO->getEmail(),
            'password' => $DTO->getPassword(),
            'scope' => '*',
        ]);

        $data = json_decode($response->getBody()->getContents());

        if (!isset($data) || property_exists($data, 'errors')) {
            throw new PassportAuthenticationException();
        }

        return $data;
    }
}
