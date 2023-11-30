<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Services\Order\BuyPremium;
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
    public function update(Rate $rate): JsonResponse
    {
        try {
            app(BuyPremium::class)->execute($rate);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
