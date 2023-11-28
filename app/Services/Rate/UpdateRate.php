<?php

namespace App\Services\Rate;

use App\Models\Rate;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateRate extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:rates,id',
            'title' => 'required',
            'description' => 'required',
            'month' => 'required',
            'price' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);
        $rate = Rate::findOrFail($data['id']);
        $rate->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'month' => $data['month'],
            'price' => $data['price'],
        ]);
        return true;
    }
}
