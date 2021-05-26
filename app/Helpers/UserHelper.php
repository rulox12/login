<?php

namespace App\Helpers;

class UserHelper
{
    const OBJECTS = 'objects';
    const EMAIL = 'correo';
    const DOCUMENT = 'cedula';

    /**
     * @param array $arrayUsers
     * @param string $word
     * @return false|mixed
     */
    public static function searchUser(array $arrayUsers, string $word)
    {
        foreach ($arrayUsers[self::OBJECTS] as $user){
            if($user[self::EMAIL] == $word || $user[self::DOCUMENT] == $word)
                return $user;
        }

        return false;
    }
}
