<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Services\Notification\CreateNotification;
use App\Services\Notification\DeleteNotifications;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NotificationController extends Controller
{

    use JsonRespondController;

    public function index(): Collection
    {
        return Notification::all(['id', 'title', 'description', 'created_at', 'updated_at']);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(CreateNotification::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function show(string $notification)
    {
        return Notification::where('id', $notification)->first();
    }

    public function destroy(string $notification): JsonResponse
    {
        try {
            app(DeleteNotifications::class)->execute([
                'id' => $notification
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
