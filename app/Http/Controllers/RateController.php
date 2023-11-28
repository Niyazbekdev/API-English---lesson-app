<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Services\Rate\UpdateRate;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RateController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        return Rate::get();
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
        }
    }
}
