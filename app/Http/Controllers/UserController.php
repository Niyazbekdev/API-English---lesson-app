<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\admin\LoginAdmin;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\Collection;
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
