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
    <h1 class="flex justify-center">Dashboard</h1>
    <section>
        <div id="containerUsers" class="flex justify-center">
            <table class="rounded">
                <thead class="py-1 bg-[#f1f2f3] border border-[#52586633] rounded-t-2xl">
                    <th class="p-1.5 border-r border-[#52586633]">
                        <button type="button" value="default" name="id" id="btnId">
                            ID
                        </button>
                    </th>
                    <th class="p-1.5 border-r border-[#52586633] hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="username" id="btnUsername" class="flex space-x-2 items-center">
                            <span>Nom d'utilisateur</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="svg_username" class="icon icon-tabler icon-tabler-arrows-down-up" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#d1d1d1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l0 18"/>
                                    <path d="M10 18l-3 3l-3 -3"/>
                                    <path d="M7 21l0 -18"/>
                                    <path d="M20 6l-3 -3l-3 3"/>
                                </svg>
                            </span>
                        </button>
                    </th>
                    <th class="p-1.5 border-r border-[#52586633] hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="email" id="btnEmail">
                            Email
                        </button>
                    </th>
                    <th class="p-1.5 border-r border-[#52586633] hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="firstname" id="btnFirstname" class="flex space-x-2 items-center">
                            <span>Prénom</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="svg_firstname" class="icon icon-tabler icon-tabler-arrows-down-up" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#d1d1d1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l0 18"/>
                                    <path d="M10 18l-3 3l-3 -3"/>
                                    <path d="M7 21l0 -18"/>
                                    <path d="M20 6l-3 -3l-3 3"/>
                                </svg>
                            </span>
                        </button>
                    </th>
                    <th class="p-1.5 border-r border-[#52586633] hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="lastname" id="btnLastname" class="flex space-x-2 items-center">
                            <span>Nom</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="svg_lastname" class="icon icon-tabler icon-tabler-arrows-down-up" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#d1d1d1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l0 18"/>
                                    <path d="M10 18l-3 3l-3 -3"/>
                                    <path d="M7 21l0 -18"/>
                                    <path d="M20 6l-3 -3l-3 3"/>
                                </svg>
                            </span>
                        </button>
                    </th>
                    <th class="p-1.5 border-r border-[#52586633] hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="role" id="btnRole" class="flex space-x-2 items-center">
                            <span>Rôle</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="svg_role" class="icon icon-tabler icon-tabler-arrows-down-up" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#d1d1d1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l0 18"/>
                                    <path d="M10 18l-3 3l-3 -3"/>
                                    <path d="M7 21l0 -18"/>
                                    <path d="M20 6l-3 -3l-3 3"/>
                                </svg>
                            </span>
                        </button>
                    </th>
                    <th class="p-1.5 border-r border-[#52586633] hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="created_at" id="btnCreatedAt" class="flex space-x-2 items-center">
                            <span>Créer le</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="svg_created_at" class="icon icon-tabler icon-tabler-arrows-down-up" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#d1d1d1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l0 18"/>
                                    <path d="M10 18l-3 3l-3 -3"/>
                                    <path d="M7 21l0 -18"/>
                                    <path d="M20 6l-3 -3l-3 3"/>
                                </svg>
                            </span>
                        </button>
                    </th>
                    <th class="p-1.5 hover:bg-[#EAEBEC]">
                        <button type="button" value="default" name="updated_at" id="btnUpdatedAt" class="flex space-x-2 items-center">
                            <span>Modifier le</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="svg_updated_at" class="icon icon-tabler icon-tabler-arrows-down-up" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#d1d1d1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l0 18"/>
                                    <path d="M10 18l-3 3l-3 -3"/>
                                    <path d="M7 21l0 -18"/>
                                    <path d="M20 6l-3 -3l-3 3"/>
                                </svg>
                            </span>
                        </button>
                    </th>
                    <th class="p-1.5 border-l border-[#52586633] hover:bg-[#EAEBEC]">
                        <p>
                            Supprimer
                        </p>
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
