<?php

namespace App\Http\Controllers;

use App\Services\User\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function store(Request $request)
    {
        try {
            [$user, $token] = app(LoginUser::class)->execute($request->all());
            return [
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'token' => $token
                ]
            ];
        }catch (ValidationException $exception){
            return response([
                'errors' => $exception->validator->errors()->all()
            ]);
        }catch (\Exception $exception){
            if($exception->getCode() == 401){
                return response([
                    'errors' => $exception->getMessage()
                ], $exception->getCode());
            }
        }
    }
}
