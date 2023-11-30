<?php

namespace App\Services\Quiz;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class IndexQuizQuestion extends BaseServices
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

    public function execute(array $data, Quiz $quiz): LengthAwarePaginator
    {
        $this->validate($data);
        return $quiz->questions()->paginate($data['limit']) ?? $quiz->questions()->paginate();
    }
}
