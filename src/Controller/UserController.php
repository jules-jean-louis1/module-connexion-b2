<?php

namespace App\Controller;
use App\Model\UserModel;
class UserController
{
    public function verifyField($field)
    {
        if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
            return $_POST[$field];
        } else {
            return false;
        }
    }
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
        var_dump($_POST);

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

        if (!$username) {
            $errors['username'] = 'Veuillez indiquer votre Nom d\'utilisateur.';
        } elseif ($username <=3 || $username >= 20) {
            $errors['username'] = 'Votre nom d\'utilisateur doit contenir entre 3 et 20 caractères';
        } elseif ($_POST['username'] !== $_SESSION['user']['username']) {
            $crtl_username = $_POST['username'];
        }
        if (!$email) {
            $errors['email'] = 'Veuillez indiquer votre adresse e-mail.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Veuillez indiquer votre adresse e-mail valide.';
        } elseif ($_POST['email'] !== $_SESSION['user']['email']) {
            $crtl_email = $_POST['email'];
        }
        if (!$firstname) {
            $errors['firstname'] = 'Entrez votre prénom.';
        } elseif (strlen($firstname) <= 2 || strlen($firstname) >= 20) {
            $errors['firstname'] = 'Votre prénom doit contenir entre 3 et 20 caractères.';
        } elseif ($_POST['firstname'] !== $_SESSION['user']['firstname']) {
            $crtl_firstname = $_POST['firstname'];
        }
        if (!$lastname) {
            $errors['lastname'] = 'Entrez votre nom';
        } elseif (strlen($lastname) <= 2 || strlen($lastname) >= 20) {
            $errors['lastname'] = 'Votre nom doit contenir entre 3 et 20 caractères';
        } elseif ($_POST['lastname'] !== $_SESSION['user']['lastname']) {
            $crtl_lastname = $_POST['lastname'];
        }
        if (!$bio) {
            $errors['bio'] = 'Veuillez indiquer votre biographie.';
        } elseif (strlen($bio) <= 2 || strlen($bio) >= 355) {
            $errors['bio'] = 'Votre biographie doit contenir entre 3 et 255 caractères';
        } elseif ($_POST['bio'] !== $_SESSION['user']['bio']) {
            $crtl_bio = $_POST['bio'];
        }

    }
}