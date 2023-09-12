<?php


function VerifyIfUsernameExist(string $username): bool
{
    $pdo = new PDO('mysql:host=localhost;dbname=moduleconnexionb2;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $pdo->prepare('SELECT id FROM users WHERE username = :username');
    $req->bindParam(':username', $username, PDO::PARAM_STR);
    $req->execute();
    $user = $req->fetchAll(PDO::FETCH_ASSOC);
    if (count($user) > 0) {
        return true;
    } else {
        return false;
    }
}
function VerifyIfExist(string $field, string $nameOfField): bool
{
    $pdo = new PDO('mysql:host=localhost;dbname=moduleconnexionb2;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT id FROM users WHERE ' . $nameOfField . ' = :field_value';
    $req = $pdo->prepare($sql);
    $req->bindParam(':field_value', $field, PDO::PARAM_STR);
    $req->execute();
    $user = $req->fetch();
    if ($user) {
        return true;
    } else {
        return false;
    }
}

var_dump(VerifyIfExist('john.doe@gmail.com', 'email'));
