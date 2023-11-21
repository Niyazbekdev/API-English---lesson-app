<?php

namespace App\Services\admin;

use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class LogOut extends BaseServices
{
    public function rules(): array
    {
        return [
        //
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        return true;
    }
}
