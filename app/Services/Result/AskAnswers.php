<?php

namespace App\Services\Result;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Models\Result;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class AskAnswers extends BaseServices
{
    public function rules(): array
    {
        return [
            'answers' => 'array',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Result $result, Question $question)
    {
        $this->validate($data);
        $is_correct = false;
        $checked = false;
        if($question->question_type_id == QuestionType::Simple->value){


            foreach ($data['answers'] as $key => $value){
                $answer = $question->answers->where('id', $value['id'])->first();

                if(isset($answer)){
                    $data['answers'][$key]['answer'] = $answer->answer;
                    $data['answers'][$key]['is_correct'] = $answer->is_correct;

                    if($value['is_selected'] and !$checked) {
                        $is_correct = $answer->is_correct;
                        $checked = true;
                    }
                }
            }
            $result->questions()->syncWithoutDetaching([
                $question->id => [
                    'answers' => json_encode($data['answers']),
                    'is_answered' => true,
                    'is_correct' => $is_correct
                ]
            ]);

        }
        else if ($question->question_type_id == QuestionType::Multiple_choice->value) {


            foreach ($data['answers'] as $key => $value){
                $answer = $question->answers->where('id', $value['id'])->first();

                if(isset($answer)){
                    $data['answers'][$key]['answer'] = $answer->answer;
                    $data['answers'][$key]['is_correct'] = $answer->is_correct;

                    if ($value['is_selected'] or $answer->is_correct and !$checked) {
                        $is_correct = $value['is_selected'];

                        if(!$is_correct) {
                            $checked = true;
                        }
                    }
                }
            }

            $result->questions()->syncWithoutDetaching([
                $question->id => [
                    'answers' => json_encode($data['answers']),
                    'is_answered' => true,
                    'is_correct' => $is_correct,
                ]
            ]);
        }
        else if($question->question_type_id == QuestionType::Sequence->value){


            foreach ($data['answers'] as $key => $value) {
                $answer = $question->answers->where('id', $value['id'])->first();

                if(isset($answer)){
                    $data['answers'][$key]['answer'] = $answer->answer;
                    $data['answers'][$key]['is_correct'] = $answer->position == $key;

                    if(! $checked) {
                        $is_correct = $answer->position == $key;

                        if(! $is_correct){
                            $checked = true;
                        }
                    }
                }
            }

            $result->questions()->syncWithoutDetaching([
                $question->id => [
                    'answers' => json_encode($data['answers']),
                    'is_answered' => true,
                    'is_correct' => $is_correct
                ]
            ]);
        }
        else if ($question->question_type_id == QuestionType::Drag_and_drop->value) {


            foreach ($data['answers'] as $key => $value) {
                $answer = $question->answers->where('id', $value['id'])->first();

                if(isset($answer)){
                    $data['answers'][$key]['answer'] = $answer->answer;
                    $data['answers'][$key]['is_correct'] = $answer->position == $key;
                    $data['answers'][$key]['drag_text'] = $answer->drag_text;

                    if(! $checked) {
                        $is_correct = $answer->position == $key;

                        if(! $is_correct) {
                            $checked = true;
                        }
                    }
                }
            }

            $result->questions()->syncWithoutDetaching([
                $question->id => [
                    'answers' => json_encode($data['answers']),
                    'drags' => json_encode($data['drags']),
                    'is_answered' => true,
                    'is_correct' => $is_correct
                ]
            ]);
        }
        else if ($question->question_type_id == QuestionType::Input->value) {
            $answer_text = $question->answers->first()->title;

            if(isset($data['answer_text'])) {
                $is_correct = $answer_text == $data['answer_text'];

                $result->questions()->syncWithoutDetaching([
                    $question->id => [
                        'is_answered' => true,
                        'answer_text' => $data['answer_text'],
                        'is_correct' => $is_correct,
                    ]
                ]);
            }
        }

        if($is_correct) {
            $result->correct_questions_count +=1;
        } else {
            $result->incorrect_questions_count +=1;
        }

        $result->save();

        return $result->questions()->where('id', $question->id)->first();
    }
}
