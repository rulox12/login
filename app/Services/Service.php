<?php

namespace App\Services;

use App\Contracts\ServiceContract;
use App\System\Settings;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Service implements ServiceContract
{
    private $client;
    protected $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
        $this->init();
    }

    private function init()
    {
        if (!is_null($this->settings) && $this->settings->getClient()) {
            $this->client = $this->settings->getClient();
        } else {
            $this->client = new Client([
                'timeout' => 10.0,
            ]);;
        }
    }

    public function call()
    {
        try {
            $response = $this->client->request($this->settings->getMethod(), $this->settings->getBaseUrl() . $this->settings->getFunction());

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            return [];
        }
    }

    /**
     * @return Settings
     */
    public function getSettings(): Settings
    {
        return $this->settings;
    }
}
