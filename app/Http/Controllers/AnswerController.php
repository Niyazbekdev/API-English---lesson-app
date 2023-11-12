<?php

namespace App\Http\Controllers;

use App\Services\admin\DeleteAnswer;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AnswerController extends Controller
{
    use JsonRespondController;
    public function destroy(string $answer): JsonResponse
    {
        try {
            app(DeleteAnswer::class)->execute([
                'id' => $answer
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }
}
