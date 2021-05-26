<?php

namespace App\System;

use GuzzleHttp\Client;

class Settings
{
    /**
     * @var string
     */
    private $baseUrl = null;

    /**
     * @var Client
     */
    private $client = null;

    /**
     * @var string
     */
    private $method = null;

    /**
     * @var string
     */
    private $function;

    public function initUser()
    {
        $this->setBaseUrl('http://www.mocky.io/v2/');
        $this->setClient(new Client([
            'timeout' => 15.0,
        ]));
    }

    public function initCountry()
    {
        $this->setBaseUrl('https://restcountries.eu/rest/v2/');
        $this->setClient(new Client([
            'timeout' => 15.0,
        ]));
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getFunction(): string
    {
        return $this->function;
    }

    public function setFunction(string $function)
    {
        $this->function = $function;
    }
}
