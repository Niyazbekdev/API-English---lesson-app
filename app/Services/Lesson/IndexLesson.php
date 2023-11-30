<?php

namespace App\Services\Lesson;

use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class IndexLesson extends BaseServices
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

    public function execute(array $data, Modul $modul): LengthAwarePaginator
    {
        $this->validate($data);
        return $modul->lessons()->paginate($data['limit'] ?? 10);

    }
}
