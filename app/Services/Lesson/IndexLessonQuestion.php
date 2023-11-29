<?php

namespace App\Services\Lesson;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Validation\ValidationException;

class IndexLessonQuestion extends BaseServices
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

    public function execute(array $data, Lesson $lesson): LengthAwarePaginator|MorphMany
    {
        $this->validate($data);
        return $lesson->questions()->paginate($data['limit']) ?? $lesson->questions();
    }
}
