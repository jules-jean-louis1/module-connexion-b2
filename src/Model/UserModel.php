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
    public function editInfoUser(string $field, string $value, int $id)
    {
        $bdd = $this->getBdd();
        $sql = 'UPDATE users SET ' . $field . ' = :value, updated_at = NOW() WHERE id = :id';
        $req = $bdd->prepare($sql);
        $req->bindParam(':value', $value, \PDO::PARAM_STR);
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        $req->execute();
    }
}