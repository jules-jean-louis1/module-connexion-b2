<?php

namespace App\Model;
use PDO;

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
    public function VerifyPassword(string $password, int $id): bool
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT password FROM users WHERE id = :id');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        $user = $req->fetch();
        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
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

    /**
     * Function to get all users from database and return it in json format
     * Request who can change in function of the needs
     * Will return all users by order of creation, firstname, lastname, username, email, role, also can research by username, email, role
     * @return void
     */
    public function getAllUsers(string $username, string $firstname, string $lastname, string $role, string $created_at, string $updated_at, string $order): array
    {
        $bdd = $this->getBdd();
        $sql = 'SELECT id, username, email, firstname, lastname, role, created_at, updated_at FROM users';
        if ($username !== '' && $order !== '') {
            $sql .= 'ORDER BY username ' . $order;
        }
        if ($firstname !== '' && $order !== '') {
            $sql .= 'ORDER BY firstname ' . $order;
        }
        if ($lastname !== '' && $order !== '') {
            $sql .= 'ORDER BY lastname ' . $order;
        }
        if ($role !== '' && $order !== '') {
            $sql .= 'ORDER BY role ' . $order;
        }
        if ($created_at !== '' && $order !== '') {
            $sql .= 'ORDER BY created_at ' . $order;
        }
        if ($updated_at !== '' && $order !== '') {
            $sql .= 'ORDER BY updated_at ' . $order;
        }
        $req = $bdd->prepare($sql);
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
}