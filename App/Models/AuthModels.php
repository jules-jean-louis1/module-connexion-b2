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
}