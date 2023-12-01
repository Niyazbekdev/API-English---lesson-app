<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Services\Notification\CreateNotification;
use App\Services\Notification\DeleteNotifications;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class NotificationController extends Controller
{

    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $notification = Notification::when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return NotificationResource::collection($notification);
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
