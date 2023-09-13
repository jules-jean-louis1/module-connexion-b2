<?php

namespace App\Controller;
use App\Model\UserModel;
class UserController
{

    public function getUserInfo(int $id): void
    {
        $userModel = new UserModel();
        $user = $userModel->getUserInfo($id);
        echo json_encode($user);
    }
}