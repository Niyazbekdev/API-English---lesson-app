<?php

namespace App\Http\Controllers;

use App\Services\user\LoginUser;
use App\Services\user\RegisterUser;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use JsonRespondController;
    public function register(Request $request)
    {
        try {
            [$user, $token] = app(RegisterUser::class)->execute($request->all());
            return [
                'data'=> [
                    'phone' => $user->phone,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'token' => $token,
                ]
            ];
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function login(Request $request)
    {
        try {
            [$user, $token] = app(LoginUser::class)->execute($request->all());
            return [
                'data' => [
                    'phone' => $user->phone,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'token' => $token,
                ]
            ];
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function logOut(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->respondSuccess();
    }

    public function profile(Request $request): JsonResponse
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
        ]);
        return $this->respondSuccess();
    }
}
