<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\loginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Str;

class LoginUserController extends Controller
{
    public function __invoke(loginUserRequest $request): JsonResponse
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
            
            $user = Auth::user();
            $lifeTime = 60*60*24;
            $keyCache = "user_{$user->id}_login";
            $data = [
                'access_token' => $this->getToken($user),
                'token_type' => 'Bearer',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ];
            $this->updateToken($data['access_token'], $data['user']['id']);
            Cache::put($keyCache, $data, $lifeTime);

            return response()->json($data, Response::HTTP_OK);
            
        } catch(Exception $e) {
            return response()->json([
                'menssage' => 'Serviço indisponível'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    private function getToken($user): string 
    {   
        return Str::random(10);
    }

    private function updateToken(string $token, int $id) {
        User::where('id', $id)->update(['remember_token' => $token]);
    }
}
