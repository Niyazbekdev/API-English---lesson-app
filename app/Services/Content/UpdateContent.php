<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateContent extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:contents,id',
            'title' => 'required',
            'description' => 'required',
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

        $content->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }
}
