<?php

namespace App\Services\admin;

use App\Models\User;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class AllUser extends BaseServices
{
    public function rules(): array
    {
        return [
            'limit' => 'nullable'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): LengthAwarePaginator
    {
        $this->validate($data);
        return User::paginate($data['limit']) ?? User::paginate();
    }
}
