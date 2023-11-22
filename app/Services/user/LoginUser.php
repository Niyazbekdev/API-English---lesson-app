<?php

namespace App\Services\user;

use App\Models\User;
use App\Services\BaseServices;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUser extends BaseServices
{
    public function rules(): array
    {
        return [
            'phone' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function execute($data): array
    {
        $this->validate($data);

        $user = User::where('phone', $data['phone'])->first();

        if(!$user){
            throw new Exception('user not found or passowrd in correct');
        }

        $token = $user->CreateToken('user mode', ['user'])->plainTextToken;

        return [$user, $token];
    }
}
