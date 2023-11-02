<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\Auth\Actions\RegisterAction;
use App\Services\Auth\DTO\RegisterDTO;
use App\Services\Auth\Exceptions\UserNotRegisteredException;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    public function login()
    {

    }

    public function logout()
    {

    }

}
