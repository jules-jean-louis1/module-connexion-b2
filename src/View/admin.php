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
    <script defer type="module" src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/js/admin.js';?>"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/css/home.css';?>">
    <title>admin</title>
</head>
<body>
<header>
    <?php require_once 'src/View/import/header.php'; ?>
</header>
<main>
    <div id="containerFormLoginRegister"></div>
    <div id="dialogModal_Overlay"></div>
    <h1>Home</h1>
    <section>
        <div id="containerUsers">
            <table>
                <thead>
                    <th>
                        <button type="button" value="" name="id" id="btnId">
                            ID
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="username" id="btnUsername">
                            Nom d'utilisateur
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="email" id="btnEmail">
                            Email
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="firstname" id="btnFirstname">
                            Prénom
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="lastname" id="btnLastname">
                            Nom
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="role" id="btnRole">
                            Rôle
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="created_at" id="btnCreated_at">
                            Créer
                        </button>
                    </th>
                    <th>
                        <button type="button" value="" name="updated_at" id="btnUpdated_at">
                            Modifier
                        </button>
                    </th>
                </thead>
                <tbody id="containerUsersBody">
                </tbody>
            </table>
        </div>
    </section>
</main>
<footer>
    <?php require_once 'src/View/import/footer.php'; ?>
</footer>
</body>
</html>

<?php else: ?>
<?php header('Location: /moduleconnexionb2'); ?>
<?php endif; ?>
