<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Services\Rate\UpdateRate;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RateController extends Controller
{
    use JsonRespondController;

    public function index(Request $request)
    {
        return Rate::when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);
    }

    public function update(Request $request, string $rate): JsonResponse
    {
        try {
            app(UpdateRate::class)->execute([
                'id' => $rate,
                'title' => $request->title,
                'description' => $request->description,
                'month' => $request->month,
                'price' => $request->price,
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
