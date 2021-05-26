<?php

namespace App\Validations;

use App\Contracts\ValidationInterface;
use App\Validations\Rules\UniqueRule;
use Rakit\Validation\Validator;

class UserValidation implements ValidationInterface
{
    public static function validation(): array
    {
        $validator = new Validator;

        $validator->addValidator('unique', new UniqueRule());

        $validation = $validator->validate($_POST, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:User,email',
            'document' => 'required|unique:User,document',
            'country' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {
            return [false, $validation->errors()];
        } else {
            return [true, $validation->getValidatedData()];
        }
    }
}
