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
    }
    public function deleteUser(int $id)
    {
        $userModel = new UserModel();
        $errors = [];

        if (isset($_SESSION['user']) && $_SESSION['user']['id'] === $id) {
            $errors['error'] = 'Vous ne pouvez pas supprimer votre compte';
        }
        if ($_SESSION['user']['role'] !== 'admin') {
            $errors['error'] = 'Vous n\'avez pas les droits pour supprimer un compte';
        }
        if ($id === 2) {
            $errors['error'] = 'Vous ne pouvez pas supprimer le compte superAdmin';
        }
        if (empty($errors)) {
            $userModel->deleteUser($id);
            $errors['success'] = 'L\'utilisateur a bien été supprimé';
        }
        echo json_encode($errors);
    }
}