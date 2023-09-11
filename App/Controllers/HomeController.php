<?php

namespace App\Controllers;

class HomeController
{
    public function viewHome()
    {
        require_once __DIR__ . '/../Views/home.php';
    }
}