<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\registerUserRequest;
use App\Service\User\UserService;

class RegisterUserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;    
    }

    public function __invoke(registerUserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->register($request->validated());
            
            if (! empty($user)) {
                return response()->json([
                    'menssage' => 'succes'
                ], 201);
            }

            return response()->json([
                'menssage' => 'Erro inesperado'
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                'menssage' => 'Serviço indisponível'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
