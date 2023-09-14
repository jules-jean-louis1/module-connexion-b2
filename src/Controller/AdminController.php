<?php

namespace App\Controller;
use App\Model\UserModel;

class AdminController
{
    public function getAllUsers(string $username, string $firstname, string $lastname, string $role, string $createdAt, string $updatedAt)
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers($username, $firstname, $lastname, $role, $createdAt, $updatedAt);
        echo json_encode($users);
        /*var_dump($users);*/
    }
}