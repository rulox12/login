<?php

namespace App\Services;

use App\System\Settings;

class CountryService extends Service
{
    public function __construct(Settings $settings = null)
    {
        parent::__construct($settings ?? new Settings());
    }

    public function getCountries()
    {
        $this->settings->initCountry();

        $this->settings->setMethod('GET');
        $this->settings->setFunction('all');

        return $this->call();
    }
}
