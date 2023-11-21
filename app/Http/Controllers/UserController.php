<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\admin\LoginAdmin;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['logOut']);
    }

    public function store(Request $request)
    {
        try {
            [$user, $token] = app(LoginAdmin::class)->execute($request->all());
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
        }catch (Exception $exception){
            if($exception->getCode() == 401){
                return response([
                    'errors' => $exception->getMessage()
                ], $exception->getCode());
            }
        }
    }

    public function logOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['data' => 'user log out succesfully'],200);
    }

    public function allUsers(): Collection
    {
        return User::all(['name', 'phone', 'created_at', 'updated_at']);
    }
}
