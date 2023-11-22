<?php

namespace App\Services\user;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Services\BaseServices;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RegisterUser extends BaseServices
{
    public function rules(): array
    {
        return [
            'phone' => 'required|unique:users,phone'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): array
    {
        $this->validate($data);

        //$code = rand(111111, 999999);

        $user = User::create([
            'phone' => $data['phone'],
            'verification_code' => '345679',//Hash::make($code),
        ]);

//        Mail::to('niyazbekk001@gmail.com')->send(
//            new WelcomeMail([
//                    'name' => 'Salem Hasil',
//                    'code' => $code,
//                ])
//        );

        $token = $user->CreateToken('user model', ['admin'])->plainTextToken;

        return [$user,$token];
    }
}
