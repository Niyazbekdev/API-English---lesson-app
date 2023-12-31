<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\admin\DeleteUser;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $user = User::when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return UserResource::collection($user);
    }

    public function destroy(string $user): JsonResponse
    {
        try {
            app(DeleteUser::class)->execute([
                'id' => $user,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }
}
