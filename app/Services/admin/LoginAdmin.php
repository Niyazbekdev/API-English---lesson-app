<?php

namespace App\Services\admin;

use App\Models\User;
use App\Services\BaseServices;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAdmin extends BaseServices
{
    public function rules(): array
    {
        return [
            'phone' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function execute(array $data):array
    {
        $this->validate($data);

        $user = User::where('phone', $data['phone'])->first();

        $password = Hash::check($data['password'], $user->password);

        if(!$user or $password){
            throw new Exception('user not found or password in correct', 401);
        }

        $token = $user->CreateToken('user model', ['admin'])->plainTextToken;

        return [$user, $token];
    }
}
