<?php

namespace App\Helpers;

class UserHelper
{
    /**
     * @param array $arrayUsers
     * @param string $word
     * @return false|mixed
     */
    public static function searchUser(array $arrayUsers, string $word)
    {
        foreach ($arrayUsers['objects'] as $user){
            if($user['correo'] == $word || $user['cedula'] == $word)
                return $user;
        }

        return false;
    }
}
