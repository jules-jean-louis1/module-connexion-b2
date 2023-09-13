<?php if ($_SESSION['user']['role'] === 'admin') : ?>

<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer type="module" src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/js/home.js';?>"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/css/home.css';?>">
    <title>Home</title>
</head>
<body>
<header>
    <?php require_once 'src/View/import/header.php'; ?>
</header>
<main>
    <div id="containerFormLoginRegister"></div>
    <div id="dialogModal_Overlay"></div>
    <h1>Home</h1>
</main>
<footer>
    <?php require_once 'src/View/import/footer.php'; ?>
</footer>
</body>
</html>

<?php else: ?>
<?php header('Location: /moduleconnexionb2'); ?>
<?php endif; ?>