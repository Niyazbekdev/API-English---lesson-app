<?php

namespace App\Services\admin;

use App\Models\User;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteUser extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);
        $user = User::findOrFail($data['id']);
        $user->delete();
        return true;
    }
}
