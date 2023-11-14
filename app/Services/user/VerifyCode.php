<?php

namespace App\Services\user;

use App\Services\BaseServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class VerifyCode extends BaseServices
{
    public function rules(): array
    {
        return [
            'verification_code' => 'required'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);
        $user = Auth::user();
        $code = Hash::check($data['verification_code'],$user['verification_code']);
        if(!$code){
            return response([
                'message' => 'kiritilgen kod qate , jane bir urinip korin'
            ]);
        }
        $token = $user->CreateToken('user model', ['user'])->plainTextToken;
        return [$user, $token];
    }
}
