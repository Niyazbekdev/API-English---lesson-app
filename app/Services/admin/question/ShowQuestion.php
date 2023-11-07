<?php

namespace App\Services\admin\question;

use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ShowQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
          'id' => 'required|exists:questions,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data)
    {
        $this->validate($data);
        $question = Question::where('id', $data['id'])->first();
        if(!$question){
            return response([
                'message' => 'question not found',
            ]);
        }else{
            return $question;
        }
    }
}
