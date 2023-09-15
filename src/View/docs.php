<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer type="module" src="./public/js/home.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="icon" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/icones/logo_module.jpg'; ?>">
    <title>Docs - Module.co</title>
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
            <section class="pt-6 flex space-x-2">
                <div class="flex space-x-2 rounded border w-fit p-2">
                    <a href="https://github.com/jules-jean-louis1/moduleconnexionb2" target="_blank" class="flex text-black">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/>
                            </svg>
                        </span>
                        Lien vers le dépôt GitHub du projet
                    </a>
                </div>
                <div class="flex space-x-2 rounded border w-fit p-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 15l6 -6"/>
                            <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"/>
                            <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"/>
                        </svg>
                    </span>
                    <a href="https://jules-jean-louis.students-laplateforme.io/Projet/index.php" >
                        Les autres projets
                    </a>
                </div>
            </section>
        </div>
    </section>
</main>
<footer>
    <?php require_once 'src/View/import/footer.php'; ?>
</footer>
</body>
</html>
