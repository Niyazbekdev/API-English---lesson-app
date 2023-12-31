<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use App\Services\Quiz\UpdateQuiz;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class QuizController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $quiz = Quiz::when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return QuizResource::collection($quiz);
    }

    public function update(Request $request,string $quiz): JsonResponse
    {
        try {
            app(UpdateQuiz::class)->execute([
                'id' => $quiz,
                'title' => $request->title,
                'description' => $request->description
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }
}
