<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Auth\DTO\LoginDto;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\DTO\RegisterDTO;
use App\Http\Resources\CredentialResource;
use App\Services\Auth\Actions\LoginAction;
use App\Services\Auth\Actions\LogoutAction;
use App\Services\Auth\Actions\RegisterAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\Auth\Exceptions\UserNotFoundException;
use App\Services\Auth\Exceptions\UserNotRegisteredException;
use App\Services\Auth\Exceptions\OauthClientNotFoundException;
use App\Services\Auth\Exceptions\PassportAuthenticationException;

class AuthController extends Controller
{
    /**
     * @throws UserNotRegisteredException
     */
    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        $registerDTO = RegisterDTO::fromRequest($request);

        return response()->json(['success' => $action->run($registerDTO)]);
    }

    /**
     * @throws UserNotFoundException
     * @throws OauthClientNotFoundException
     * @throws PassportAuthenticationException
     */
    public function login(LoginRequest $request, LoginAction $action): CredentialResource
    {
        $loginDTO = LoginDto::from($request);

        return $action->run($loginDTO);
    }

    /**
     * @param LogoutRequest $request
     * @param LogoutAction $action
     * @return JsonResponse
     */
    public function logout(LogoutRequest $request, LogoutAction $action): JsonResponse
    {
        $user = $request->getUserData();

        return response()->json(['success' => $action->run($user)]);
    }

}
