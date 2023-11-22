<?php

namespace App\Services\modul;

use App\Models\Content;
use App\Models\Lesson;
use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteModul extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:moduls,id',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $modul = Modul::findOrFail($data['id']);

        $lessons = Lesson::where('modul_id',$data['id'])->get();

        foreach ($lessons as $lesson){
            Lesson::find($lesson['id'])->delete();

            if($lesson['type_lesson_id'] == 2){
                $contents = Content::where('lesson_id', $lesson['id']);

                foreach ($contents as $content){
                    Content::find($content['id'])->delete();
                }
            }
        }

        $modul->delete();

        return true;
    }
}
