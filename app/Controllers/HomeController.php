<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->render(__CLASS__, 'index');
    }
}
