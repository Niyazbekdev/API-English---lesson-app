<?php

namespace App\Http\Controllers;

use App\Services\user\LoginUser;
use App\Services\user\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
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
}
