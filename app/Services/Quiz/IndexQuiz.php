<?php

namespace App\Services\Quiz;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class IndexQuiz extends BaseServices
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

        return Quiz::paginate($data['limit']) ?? Quiz::paginate();
    }
}
