<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\admin\LoginAdmin;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    use JsonRespondController;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['logOut']);
    }

    public function login(Request $request): array|JsonResponse
    {
        try {
            [$user, $token] = app(LoginAdmin::class)->execute($request->all());
            return [
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'token' => $token
                ]
            ];
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }

    public function logOut(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->respondSuccess();
    }

}
