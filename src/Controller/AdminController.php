<?php

namespace App\Controller;
use App\Model\UserModel;

class AdminController
{
    public function getAllUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers('','', '', '', '', '', '');
        echo json_encode($users);
    }
}