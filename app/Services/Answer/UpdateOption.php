<?php

namespace App\Services\Answer;

use App\Models\Answer;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateOption extends BaseServices
{
    public function rules(): array
    {
        return [
            'answers' => 'array',
            'answers.*.' => 'numeric',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $i = 0;

        foreach ($data['answers'] as $answer_id){
            Answer::where('id', $answer_id)->update([
                'position' => $i,
            ]);

            $i++;
        }

        return true;
    }
}
