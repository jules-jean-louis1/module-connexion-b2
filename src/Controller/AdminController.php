<?php

namespace App\Controller;
use App\Model\UserModel;

class AdminController
{
    private UserModel $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function getAllUsers(string $search,string $username, string $firstname, string $lastname, string $role, string $createdAt, string $updatedAt): void
    {
        $users = $this->userModel->getAllUsers($search,$username, $firstname, $lastname, $role, $createdAt, $updatedAt);
        echo json_encode($users);
    }
    public function deleteUser(int $id): void
    {
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
            $this->userModel->deleteUser($id);
            $errors['success'] = 'L\'utilisateur a bien été supprimé';
        }
        echo json_encode($errors);
    }

    public function editUserRole(int $id): void
    {
        $errors = [];
        $role = $_POST['role'];

        if (isset($_SESSION['user']) && $_SESSION['user']['id'] === $id) {
            $errors['error'] = 'Vous ne pouvez pas modifier votre rôle';
        }
        if ($_SESSION['user']['role'] !== 'admin') {
            $errors['error'] = 'Vous n\'avez pas les droits pour modifier un rôle';
        }
        if ($id === 2) {
            $errors['error'] = 'Vous ne pouvez pas modifier le rôle du compte superAdmin';
        }
        if (empty($errors)) {
            $this->userModel->editUserRole($id,$role);
            $errors['success'] = 'Le rôle de l\'utilisateur a bien été modifié';
        } else {
            $errors['error'] = 'Une erreur est survenue';
        }
        echo json_encode($errors);
    }
}