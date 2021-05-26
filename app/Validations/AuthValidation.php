<?php

namespace App\Validations;

use App\Contracts\ValidationInterface;
use Rakit\Validation\Validator;

class AuthValidation implements ValidationInterface
{
    public static function validation(): array
    {
        $validator = new Validator;

        $validation = $validator->validate($_POST, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return [false, $validation->errors()];
        } else {
            return [true, $validation->getValidatedData()];
        }
    }
}
