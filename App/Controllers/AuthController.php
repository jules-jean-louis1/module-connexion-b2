<?php

namespace App\Controllers;
use App\Models\AuthModels;
use Composer\Json\JsonFile;

class AuthController
{
    public function verifyField($field)
    {
        if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
            return $_POST[$field];
        } else {
            return false;
        }
    }
    public function ValidUsername(string $username): bool
    {
        if (strlen($username) < 3 || strlen($username) > 20) {
            return false;
        } elseif (preg_match('/[^a-z0-9]/', $username)) {
            return false;
        } else {
            return true;
        }
    }
    public function CheckPassword(string $password): string
    {
        $password = trim($password);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $password = password_hash($password, PASSWORD_DEFAULT);

        return $password;
    }
    public function CheckIfEmailExist(string $email): bool
    {
        $user = new AuthModels();
        if ($user->VerifyIfExist($email, 'email')) {
            return true;
        } else {
            return false;
        }
    }
    public function CheckIfUsernameExist(string $username): bool
    {
        $user = new AuthModels();
        if ($user->VerifyIfExist($username, 'username')) {
            return true;
        } else {
            return false;
        }
    }
    public function VerifyPassword(string $password): bool
    {
        // 8 caractères minimum, 3 lettres minuscules minimum, 2 lettres majuscules minimum, 2 chiffres minimum, 1 caractère spécial minimum
        if (preg_match("/^(?=(.*[a-z]){3,})(?=(.*[A-Z]){2,})(?=(.*[0-9]){2,})(?=(.*[!@#$%^&*()\-__+.]){1,}).{8,}$/", $password)) {
            return true;
        } else {
            return false;
        }
    }
    private function generateAvatarImage($text, $backgroundColor,string $firstname,string $lastname, string $username)
    {
        $canvas = imagecreatetruecolor($canvasWidth, $canvasHeight);

        // Convertir la couleur d'arrière-plan en composantes RGB
        $backgroundR = hexdec(substr($backgroundColor, 1, 2));
        $backgroundG = hexdec(substr($backgroundColor, 3, 2));
        $backgroundB = hexdec(substr($backgroundColor, 5, 2));

        // Remplir le canvas avec la couleur d'arrière-plan
        $backgroundColor = imagecolorallocate($canvas, $backgroundR, $backgroundG, $backgroundB);
        imagefill($canvas, 0, 0, $backgroundColor);

        // Définir la couleur du texte
        $foregroundColor = imagecolorallocate($canvas, 255, 255, 255); // Blanc

        // Centrer le texte dans le canvas
        $fontSize = floor(100.00);
        $fontPath = 'public/font/Rajdhani-SemiBold.ttf'; // Chemin vers le dossier des polices de caractères
        $textBoundingBox = imageftbbox($fontSize, 0, $fontPath, $text);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];
        $textX = ($canvasWidth - $textWidth) / 2;
        $textY = ($canvasHeight - $textHeight) / 2 + $textHeight;

        // Dessiner le texte sur le canvas avec la police de caractères par défaut
        imagefttext($canvas, $fontSize, 0, $textX, $textY, $foregroundColor, $fontPath, $text);

        // Enregistrer l'image dans un fichier PNG
        $randomString = bin2hex(random_bytes(3)); // Génère une chaîne hexadécimale de 6 caractères
        $avatarName = $randomString . '-' . $username.'.png';
        $filename = 'public/images/avatars/' . $avatarName; // Chemin vers le dossier et nom du fichier d'avatar
        imagepng($canvas, $filename);
        imagedestroy($canvas);

        return $avatarName;
    }
    public function register(): void
    {
        $username = $this->verifyField('username');
        $email = $this->verifyField('email');
        $firstname = $this->verifyField('firstname');
        $lastname = $this->verifyField('lastname');
        $password = $this->verifyField('password');
        $password_confirm = $this->verifyField('password_confirm');

        $errors = [];

        if (!$username){
            $errors['username'] = 'Le champ username est requis';
        } elseif (!$this->ValidUsername($username)) {
            $errors['username'] = 'Le champ username doit contenir entre 3 et 20 caractères et ne doit pas contenir de caractères spéciaux';
        } elseif ($this->CheckIfUsernameExist($username)) {
            $errors['username'] = 'Le champ username est déjà utilisé';
        }
        if (!$email) {
            $errors['email'] = 'Le champ email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Le champ email doit être un email valide';
        } elseif ($this->CheckIfEmailExist($email)) {
            $errors['email'] = 'Le champ email est déjà utilisé';
        }
        if (!$firstname) {
            $errors['firstname'] = 'Le champ firstname est requis';
        }
        if (!$lastname) {
            $errors['lastname'] = 'Le champ lastname est requis';
        }
        if (!$password) {
            $errors['password'] = 'Le champ password est requis';
        } elseif (strlen($password) < 8 || strlen($password) > 35) {
            $errors['password'] = 'Le champ password doit contenir entre 8 et 35 caractères';
        } elseif (!$this->VerifyPassword($password)) {
            $errors['password'] = 'Le champ password doit contenir au moins 3 lettres minuscules, 2 lettres majuscules, 2 chiffres et 1 caractère spécial';
        }
        if (!$password_confirm) {
            $errors['password_confirm'] = 'Le champ password_confirm est requis';
        } elseif ($password !== $password_confirm) {
            $errors['password_confirm'] = 'Le champ password_confirm doit être identique au champ password';
        }
        if (empty($errors)) {
            $user = new AuthModels();
            $user->register($username, $email, $firstname, $lastname, $password);
        } else {
            $json = json_encode($errors);
            echo $json;
        }
    }
}