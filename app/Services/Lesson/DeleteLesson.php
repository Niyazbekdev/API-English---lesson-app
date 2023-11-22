<?php

namespace App\Services\Lesson;

use App\Models\Content;
use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteLesson extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:lessons,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $lesson = Lesson::findOrFail($data['id']);

        $contents = Content::where('lesson_id', $data['id']);

        foreach ($contents as $content){
            Content::find($content['id'])->delete();
        }

        $lesson->delete();

        return true;
    }
}
