<?php

namespace App\Controllers;
use App\Models\AuthModels;

class AuthController
{
    public function verifyField($field)
    {
        if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
            return $_POST[$field];
        } else {
            return false;
        }
    }
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
    public function CheckPassword(string $password): string
    {
        $password = trim($password);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $password = password_hash($password, PASSWORD_DEFAULT);

        return $password;
    }
}