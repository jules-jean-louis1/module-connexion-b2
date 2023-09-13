<?php

namespace App\Model;

class UserModel extends AbstractDatabase
{
    public function getUserInfo(int $id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT username, email, firstname, lastname, bio, created_at, updated_at FROM users WHERE id = :id');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        $user = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $user;
    }

}