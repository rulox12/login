<?php

namespace App\Controllers;

use App\Models\User;
use App\System\Session;
use App\Validations\AuthValidation;

class AuthController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->init();

    }

    public function login()
    {
        [$status, $data] = AuthValidation::validation();

        if (!$status) {
            $this->render(__CLASS__, __FUNCTION__, ['message' => 'Envía todos los campos necesarios']);
        }

        $user = User::where('email', $data['email'])->first();

        if ($user && password_verify($data['password'], $user->password)) {
            $this->session->add('user', $user);
            header('Location: users');
        }

        $this->render(__CLASS__, __FUNCTION__, ['message' => 'No pudo ingresar']);

    }

    public function logout()
    {
        $this->session->close();
        header('location: /');
    }
}
