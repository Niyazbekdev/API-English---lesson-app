<?php

namespace App\Services\Notification;

use App\Models\Notification;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CreateNotification extends BaseServices
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        Notification::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }
}
