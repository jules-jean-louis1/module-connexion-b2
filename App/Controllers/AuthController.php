<?php

namespace App\Controllers;

class AuthController
{
    public function ValidUsername(string $username): bool
    {
        if (strlen($username) < 3 || strlen($username) > 20) {
            return false;
        } elseif (preg_match('/[^a-z0-9]/', $username)) {
            return false;
        } else {
            return true;
        }
    }
    public function CheckUsername(string $username): string
    {
        $username = trim($username);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = strtolower($username);
        $username = preg_replace('/[^a-z0-9]/', '', $username);
        $username = substr($username, 0, 20);

        return $username;
    }
    public function VerifyIfUserExist(string $username): bool
    {

    }
}