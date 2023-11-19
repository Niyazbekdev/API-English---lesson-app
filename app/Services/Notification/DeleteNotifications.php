<?php

namespace App\Services\Notification;

use App\Models\Notification;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteNotifications extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:notifications,id',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $notification = Notification::findOrFail($data['id']);
        $notification->delete();

        return true;
    }
}
