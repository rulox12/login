<?php

namespace App\Controllers;

use App\System\View;

abstract class Controller
{
    protected $view;

    public function render(string $controllerName, string $view, $params = array())
    {
        $this->view = new View($controllerName, $view, $params);
    }
}
