<?php

namespace App\Controllers;

use App\Domain\User\CreateOrUpdateUserAction;
use App\Helpers\UserHelper;
use App\Models\User;
use App\Services\CountryService;
use App\Services\UserService;
use App\System\Session;
use App\Validations\UserValidation;

class UserController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->init();
    }

    public function index()
    {
        if (is_null($this->session->get('user'))) {
            $this->render(AuthController::class, 'login');
        }

        $this->render(__CLASS__, 'index', [
            'users' => User::all(),
        ]);
    }

    public function show(User $user)
    {
        if (is_null($this->session->get('user'))) {
            $this->render(AuthController::class, 'login');
        }

        $this->render(__CLASS__, 'show', [
            'user' => $user,
        ]);
    }

    public function create()
    {
        if ($this->session->get('user')) {
            $this->index();
            exit();
        }

        $this->render(__CLASS__, __FUNCTION__, [
            'countries' => (new CountryService)->getCountries()
        ]);
    }

    public function register()
    {
        [$status, $data] = UserValidation::validation();

        if (!$status) {
            $this->render(__CLASS__, 'create', [
                'errors' => $data->toArray(),
                'countries' => (new CountryService())->getCountries(),
            ]);
        }

        $user = CreateOrUpdateUserAction::execute($data, new User());

        $this->session->add('user',$user);

        $this->render(__CLASS__, 'show', [
            'user' => $user
        ]);
    }

    public function search()
    {
        $user = User::search($_POST['search'])->first();

        if (!$user) {
            $user = $this->seeExternalUser($_POST['search']);
            if (!$user) {
                $this->render(__CLASS__, 'index', [
                    'users' => User::all(),
                    'message' => 'No se encontro usuarios ni en base de datos ni en servicios externos'
                ]);
                exit();
            }
        }

        $this->render(__CLASS__, 'show', [
            'user' => $user
        ]);
    }

    private function seeExternalUser(string $word)
    {
        $users = (new UserService())->getUsers();

        return UserHelper::searchUser($users, $word);
    }
}
