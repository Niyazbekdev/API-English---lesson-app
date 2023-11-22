<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteContent extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:contents,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $content = Content::findOrFail($data['id']);

        $content->delete();

        return true;
    }
}
