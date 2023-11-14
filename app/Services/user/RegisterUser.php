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
    public function execute(array $data)
    {
        $this->validate($data);
        $code = rand(111111, 999999);
        User::create([
            'phone' => $data['phone'],
            'verification_code' => Hash::make($code),
        ]);
        Mail::to('hasilsultamuratov08@gmail.com')->send(
            new WelcomeMail([
                    'name' => 'Salem Hasil',
                    'code' => $code,
                ])
        );
        return response([
            'success' => true,
            'message' => 'telefonizga bargan smsti kiritin'
        ]);
    }
}
