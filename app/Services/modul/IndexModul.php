<?php

namespace App\Services\modul;

use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class IndexModul extends BaseServices
{
    public function rules(): array
    {
        return [
            'limit' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): LengthAwarePaginator
    {
        $this->validate($data);

        return Modul::paginate($data['limit'] ?? 10);
    }
}
