<?php

namespace App\Models;

class AuthModels extends AbstractDatabase
{
    public function UsernameVerify(string $username): bool
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT user FROM users WHERE username = :username');
        $req->execute(['username' => $username]);
        $user = $req->fetch();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
    public function VerifyIfExist(string $field, string $nameOfField): bool
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT user FROM users WHERE ' . $nameOfField . ' = :' . $field);
        $req->execute([$field => $field, $nameOfField => $nameOfField]);
        $user = $req->fetch();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}