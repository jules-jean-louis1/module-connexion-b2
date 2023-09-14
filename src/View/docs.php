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
<main class="h-[92vh]">
    <div id="containerFormLoginRegister"></div>
    <div id="dialogModal_Overlay"></div>
    <section id="mainContainerHome" class="flex justify-between h-full">
        <div id="left90degresponsive_contact" class="flex items-center">
            <h3 class="text-4xl uppercase">Documentation</h3>
            <div class="w-10 bg-gray-600" id="barre_dialog_contact"></div>
        </div>
        <div id="content_page">
            <section>
                <h1 class="text-[3rem] font-bold">À Propos du Site</h1>
                <div>
                    <p>Ce site a été conçu pour offrir une expérience de connexion et d'inscription efficace.</p>
                    <p>Pour sa conception, les technologies suivantes ont été utilisées :</p>
                </div>
                <h2 class="text-[2rem] font-bold">Technologies Employées</h2>
                <ul>
                    <li><strong>Backend :</strong> Le backend a été développé en utilisant PHP, ce qui permet de gérer la logique côté serveur.</li>
                    <li><strong>Frontend :</strong> Le frontend a été réalisé en JavaScript natif pour une interaction fluide avec les utilisateurs.</li>
                    <li><strong>Architecture MVC :</strong> Le site suit le modèle MVC (Modèle-Vue-Contrôleur) pour une structuration claire du code.</li>
                    <li><strong>Gestion des Erreurs :</strong> En backend, des fonctions système de PHP telles que filter_var, password_hash, etc., sont employées pour garantir une sécurité accrue et une gestion efficace des erreurs.</li>
                    <li><strong>Système de Routage :</strong> Le site utilise Altorouter pour gérer les routes, facilitant ainsi la navigation et le traitement des demandes.</li>
                    <li><strong>API Fetch :</strong> L'API Fetch est employée pour effectuer des requêtes asynchrones vers le backend et gérer les formulaires de manière fluide.</li>
                </ul>
            </section>
            <section>
                <h2 class="text-[2rem] font-bold">Pages du Site</h2>
                <ul>
                    <li><strong>Page d'accueil :</strong> La page par défaut contient des liens vers différentes sections du site et affiche le titre principal.</li>
                    <li><strong>Page de documentation (actuelle) :</strong> Cette page présente une description détaillée du site ainsi que divers éléments composés.</li>
                    <li><strong>Page de profil :</strong> Sur cette page, les utilisateurs peuvent mettre à jour leurs informations personnelles et supprimer leur compte.</li>
                    <li><strong>Page d'administration :</strong> Cette page permet aux administrateurs de visualiser tous les utilisateurs, d'apporter des modifications, de supprimer des comptes et de trier les données selon leurs besoins.</li>
                </ul>
            </section>
        </div>
    </section>
</main>
<footer>
    <?php require_once 'src/View/import/footer.php'; ?>
</footer>
</body>
</html>
