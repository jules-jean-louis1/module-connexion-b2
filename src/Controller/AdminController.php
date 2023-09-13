<?php

namespace App\Controller;
use App\Model\UserModel;

class AdminController
{
    public function getAllUsers(string $username, string $firstname, string $lastname, string $role, string $createdAt, string $updatedAt)
    {
        var_dump($username, $firstname, $lastname, $role, $createdAt, $updatedAt);
        /*$userModel = new UserModel();
        $users = $userModel->getAllUsers($username, $firstname, $lastname, $role, $createdAt, $updatedAt);
        echo json_encode($users);*/
    }
}