<?php

namespace App\Controller;
use App\Model\AuthModel;
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
        } else {
            return true;
        }
    }
    public function ValidFieldForm(string $field): string
    {
        $field = trim($field);
        $field = htmlspecialchars($field);
        $field = filter_var($field, FILTER_SANITIZE_STRING);

        return $field;
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
    private function generateAvatarImage($text, $backgroundColor, string $username)
    {
        $canvasWidth = 200;
        $canvasHeight = 200;

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
        $password_confirm = $this->verifyField('passwordConfirm');

        $errors = [];
        $user = new AuthModel();

        if (!$username){
            $errors['username'] = 'Le champ username est requis';
        } elseif (!$this->ValidUsername($username)) {
            $errors['username'] = 'Le champ username doit contenir entre 3 et 20 caractères et ne doit pas contenir de caractères spéciaux';
        } elseif ($user->VerifyIfUsernameExist($username)) {
            $errors['username'] = 'Ce nom d\'utlisateur est déjà utilisé';
            $errors['useUsername'] = 'Ce nom d\'utlisateur est déjà utilisé';
        }
        if (!$email) {
            $errors['email'] = 'Le champ email est requis';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Le champ email doit être un email valide';
        } elseif ($user->VerifyIfExist($email, 'email')) {
            $errors['email'] = 'Cette email est déjà utilisé';
            $errors['useEmail'] = 'Cette email est déjà utilisé';
        }
        if (!$firstname) {
            $errors['firstname'] = 'Le champ firstname est requis';
        } elseif (strlen($firstname) < 2 || strlen($firstname) > 20) {
            $errors['firstname'] = 'Le champ firstname doit contenir entre 3 et 20 caractères';
        }
        if (!$lastname) {
            $errors['lastname'] = 'Le champ lastname est requis';
        } elseif (strlen($lastname) < 2 || strlen($lastname) > 20) {
            $errors['lastname'] = 'Le champ lastname doit contenir entre 3 et 20 caractères';
        }
        if (!$password) {
            $errors['password'] = 'Le champ password est requis';
        } elseif (strlen($password) < 8 || strlen($password) > 35) {
            $errors['password'] = 'Le champ password doit contenir entre 8 et 35 caractères';
        } elseif (!$this->VerifyPassword($password)) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 3 lettres minuscules, 2 lettres majuscules, 2 chiffres et 1 caractère spécial';
        }
        if (!$password_confirm) {
            $errors['passwordConfirm'] = 'La confirmation du mot de passe est requis';
        } elseif ($password !== $password_confirm) {
            $errors['passwordConfirm'] = 'Le deux mot de passe ne sont pas identiques';
        }
        if (empty($errors)) {
            if ($user->VerifyIfUsernameExist($username)) {
                $errors['useUsername'] = 'Ce nom d\'utlisateur est déjà utilisé';
            } elseif ($user->VerifyIfExist($email, 'email')) {
                $errors['useEmail'] = 'Cette email est déjà utilisé';
            } else {
                // Nettoyer les données
                $username = $this->ValidFieldForm($username);
                $email = $this->ValidFieldForm($email);
                $firstname = $this->ValidFieldForm($firstname);
                $lastname = $this->ValidFieldForm($lastname);
                $password = $this->ValidFieldForm($password);
                $firstLetter = strtoupper(substr($firstname, 0, 1));
                $backgroundColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                $avatar = $this->generateAvatarImage($firstLetter, $backgroundColor, $username);
                // Ajouter l'utilisateur dans la base de données

                $user->register($username, $email, $firstname, $lastname, $password, $avatar);
                $errors['success'] = 'Votre compte a bien été créé';
            }
            echo json_encode($errors);

        } else {
            $json = json_encode($errors);
            echo $json;
        }
    }
}