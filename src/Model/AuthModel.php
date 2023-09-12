<?php

namespace App\Model;
use PDO;
class AuthModel extends AbstractDatabase
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
        $sql = 'SELECT id FROM users WHERE ' . $nameOfField . ' = :field_value';
        $req = $bdd->prepare($sql);
        $req->bindParam(':field_value', $field, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
    public function VerifyIfUsernameExist(string $username): bool
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT id FROM users WHERE username = :username');
        $req->bindParam(':username', $username, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function register(string $username, string $email, string $firstname, string $lastname, string $password, $avatar)
    {
        $bdd = $this->getBdd();
        $sql = 'INSERT INTO users (username, email, firstname, lastname, password, avatar, role, created_at) VALUES (:username, :email, :firstname, :lastname, :avatar, :role, NOW())';
        $req = $bdd->prepare($sql);
        $req->bindParam(':username', $username, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
    }
}