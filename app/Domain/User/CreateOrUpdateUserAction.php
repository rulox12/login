<?php

namespace App\Domain\User;

use App\Models\User;

class CreateOrUpdateUserAction
{
    public static function execute(array $data, User $user): User
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->document = $data['document'];
        $user->country = $data['country'];
        $user->password = password_hash($data['password'],PASSWORD_BCRYPT);

        $user->save();

        return $user;
    }
}
