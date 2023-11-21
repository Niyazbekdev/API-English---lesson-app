<?php

namespace App\Http\Controllers;

use App\Services\Answer\UpdateOption;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OptionController extends Controller
{
    use JsonRespondController;

    public function update(Request $request)
    {
        try {
            app(UpdateOption::class)->execute([
                'answers' => $request->answers,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
