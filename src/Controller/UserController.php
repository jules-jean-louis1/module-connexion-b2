<?php

namespace App\Controller;
use App\Model\UserModel;
class UserController extends AbstractClasses\AbstractUserController
{
    public function getUserInfo(int $id): void
    {
        $userModel = new UserModel();
        $user = $userModel->getUserInfo($id);
        echo json_encode($user);
    }
    public function cleanField(string $field): string
    {
        $field = trim($field);
        $field = htmlspecialchars($field);

        return $field;
    }
    public function editUserInfo(int $id)
    {
        $userModel = new UserModel();

        $errors = [];
        $username = $this->verifyField('username');
        $email = $this->verifyField('email');
        $firstname = $this->verifyField('firstname');
        $lastname = $this->verifyField('lastname');
        $bio = $this->verifyField('bio');
        $password = $this->verifyField('password');
        $passwordConfirm = $this->verifyField('passwordConfirm');

        $crtl_username = null;
        $crtl_email = null;
        $crtl_firstname = null;
        $crtl_lastname = null;
        $crtl_bio = null;

        if (!empty($_POST['username'])) {
            if ($_POST['username'] !== $_SESSION['user']['username']) {
                if (!$username) {
                    $errors['username'] = 'Veuillez renseigner un nom d\'utilisateur';
                } elseif (strlen($username) <= 2 || strlen($username) >= 20) {
                    $errors['username'] = 'Votre nom d\'utilisateur doit contenir entre 3 et 20 caractères';
                } elseif ($userModel->VerifyIfExist($username, 'username')) {
                    $errors['username'] = 'Ce nom d\'utilisateur est déjà utilisé';
                } else {
                    $crtl_username = $_POST['username'];
                }
            }
        }
        if (!empty($_POST['email'])) {
            if ($_POST['email'] !== $_SESSION['user']['email']) {
                if (!$email) {
                    $errors['email'] = 'Veuillez renseigner une adresse e-mail';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Veuillez renseigner une adresse e-mail valide';
                } elseif ($userModel->VerifyIfExist($email, 'email')) {
                    $errors['email'] = 'Cette adresse e-mail est déjà utilisée';
                } else {
                    $crtl_email = $_POST['email'];
                }
            }
        }
        if (!empty($_POST['firstname'])) {
            if ($_POST['firstname'] !== $_SESSION['user']['firstname']) {
                if (!$firstname) {
                    $errors['firstname'] = 'Veuillez renseigner votre prénom';
                } elseif (strlen($firstname) <= 2 || strlen($firstname) >= 20) {
                    $errors['firstname'] = 'Votre prénom doit contenir entre 3 et 20 caractères';
                } else {
                    $crtl_firstname = $_POST['firstname'];
                }
            }
        }
        if (!empty($_POST['lastname'])) {
            if ($_POST['lastname'] !== $_SESSION['user']['lastname']) {
                if (!$lastname) {
                    $errors['lastname'] = 'Veuillez renseigner votre nom';
                } elseif (strlen($lastname) <= 2 || strlen($lastname) >= 20) {
                    $errors['lastname'] = 'Votre nom doit contenir entre 3 et 20 caractères';
                } else {
                    $crtl_lastname = $_POST['lastname'];
                }
            }
        }
        if (!empty($_POST['bio'])) {
            if ($_POST['bio'] !== $_SESSION['user']['bio']) {
                if (!$bio) {
                    $errors['bio'] = 'Veuillez renseigner votre biographie';
                } elseif (strlen($bio) >= 300) {
                    $errors['bio'] = 'Votre biographie ne doit pas dépasser les 300 caractères';
                } else {
                    $crtl_bio = $_POST['bio'];
                }
            }
        }
        if (!empty($password) || !empty($passwordConfirm)) {
            if (!$password) {
                $errors['password'] = 'Veuillez renseigner votre mot de passe';
            } elseif (strlen($password) <= 8 || strlen($password) >= 35) {
                $errors['password'] = 'Votre mot de passe doit contenir entre 8 et 35 caractères';
            } elseif (!$this->VerifyPassword($password)) {
                $errors['password'] = 'Votre mot de passe doit contenir au moins 3 lettres minuscules, 2 lettres majuscules, 2 chiffres et 1 caractère spécial';
            }
            if (!$passwordConfirm) {
                $errors['passwordConfirm'] = 'Veuillez confirmer votre mot de passe';
            } elseif ($password !== $passwordConfirm) {
                $errors['passwordConfirm'] = 'Les deux mots de passe ne sont pas identiques';
            }
        }
        if (!empty($errors)) {
            echo json_encode($errors);
        } 

        if (empty($errors)) {
            if ($crtl_username !== null) {
                $userModel->editInfoUser('username', $crtl_username, $id);
                $_SESSION['user']['username'] = $crtl_username;
                $errors['username'] = 'Votre nom d\'utilisateur a bien été modifié';
            }
            if ($crtl_email !== null) {
                $userModel->editInfoUser('email', $crtl_email, $id);
                $_SESSION['user']['email'] = $crtl_email;
                $errors['email'] = 'Votre adresse e-mail a bien été modifiée';
            }
            if ($crtl_firstname !== null) {
                $userModel->editInfoUser('firstname', $crtl_firstname, $id);
                $_SESSION['user']['firstname'] = $crtl_firstname;
                $errors['firstname'] = 'Votre prénom a bien été modifié';
            }
            if ($crtl_lastname !== null) {
                $userModel->editInfoUser('lastname', $crtl_lastname, $id);
                $_SESSION['user']['lastname'] = $crtl_lastname;
                $errors['lastname'] = 'Votre nom a bien été modifié';
            }
            if ($crtl_bio !== null) {
                $userModel->editInfoUser('bio', $crtl_bio, $id);
                $_SESSION['user']['bio'] = $crtl_bio;
                $errors['bio'] = 'Votre biographie a bien été modifiée';
            }
            if (!empty($password) && !empty($passwordConfirm)) {
                if ($userModel->VerifyPassword($password, $id)) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $userModel->editInfoUser('password', $password, $id);
                    $errors['password'] = 'Votre mot de passe a bien été modifié';
                } else {
                    $errors['password'] = 'Votre mot de passe est incorrect';
                }
            }
            echo json_encode($errors);
        }
    }
    private function editUser($crtl, $field, $id)
    {
        $userModel = new UserModel();
        if ($crtl !== null) {
            $userModel->editInfoUser($field, $crtl, $id);
            $_SESSION['user'][$field] = $crtl;
        }
    }
}