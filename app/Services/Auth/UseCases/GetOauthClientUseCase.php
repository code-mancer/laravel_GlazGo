<?php

namespace App\Services\Auth\UseCases;

use App\Services\Auth\Exceptions\OauthClientNotFoundException;
use App\infrastructure\UseCase\BaseUseCase;
use Illuminate\Database\Eloquent\Builder;
use App\Models\OauthClient;

class GetOauthClientUseCase extends BaseUseCase
{
    /**
     * @throws OauthClientNotFoundException
     */
    public function run(): OauthClient
    {
        $client = OauthClient::query()->where('id', config('passport.client_id'))->first();

        if (!$client) {
            throw new OauthClientNotFoundException();
        }

        return $client;
    }
}
