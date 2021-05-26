<?php

namespace App\Services;

use App\System\Settings;

class UserService extends Service
{
    public function __construct(Settings $settings = null)
    {
        parent::__construct($settings ?? new Settings());
    }

    public function getUsers()
    {
        $this->settings->initUser();

        $this->settings->setMethod('GET');
        $this->settings->setFunction('5d9f38fd3000005b005246ac');

        return $this->call();
    }
}
