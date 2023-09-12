<?php

namespace App\Controller;

class HomeController
{
    public function viewHome()
    {
        require_once __DIR__ . '/../View/home.php';
    }
}