<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class IndexContent extends BaseServices
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

    public function execute($data, Lesson $lesson): LengthAwarePaginator
    {
        $this->validate($data);

        return $lesson->contents()->paginate($data['limit']) ?? $lesson->contents()->paginate();
    }
}
