<?php

namespace App\Http\Controllers;

use App\Services\user\RegisterUser;
use App\Services\user\VerifyCode;
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

    public function verifyCode(Request $request)
    {
        try {
            [$user, $token] = app(VerifyCode::class)->execute($request->all());
            return [
                'data' => [
                    'id' => $user->id,
                    'phone' => $user->phone,
                    'token' => $token,
                ]
            ];
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function login(Request $request)
    {
        //
    }
}
