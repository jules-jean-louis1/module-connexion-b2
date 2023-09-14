<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer type="module" src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/js/profil.js';?>"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/css/home.css';?>">
    <title>Profil</title>
</head>
<body>
<header>
    <?php require_once 'src/View/import/header.php'; ?>
</header>
<main>
    <div id="containerFormLoginRegister"></div>
    <div id="dialogModal_Overlay"></div>
    <h1>Profil</h1>
    <article class="flex justify-center">
        <section class="w-1/2 flex flex-col">
        <div class="w-full">
            <form action="" method="post" id="editProfil">
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="bg-transparent text-black focus:outline-none">
                            <label for="username" class="absolute top-0 left-2 px-1 py-px text-xs text-gray-500">Nom d'utilisateur</label>
                        </div>
                        <small id="errorUsername"></small>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <input name="email" id="email" class="bg-transparent text-black focus:outline-none">
                            <label for="email" class="absolute top-0 left-2 px-1 py-px text-xs text-gray-500">Email</label>
                        </div>
                        <small id="errorEmail"></small>
                    </div>
                </div>
                <div class="flex space-x-2 justify-between">
                    <div class="w-1/2">
                        <div class="relative">
                            <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                                <input name="firstname" id="firstname" class="bg-transparent text-black focus:outline-none">
                                <label for="firstname" class="absolute top-0 left-2 px-1 py-px text-xs text-gray-500">Prénom</label>
                            </div>
                            <small id="errorFirstname"></small>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div>
                            <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                                <input name="lastname" id="lastname" class="bg-transparent text-black focus:outline-none">
                            </div>
                            <small id="errorLastname"></small>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 justify-between">
                    <div class="w-1/2">
                        <div>
                            <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                                <input name="password" id="password" class="bg-transparent text-black focus:outline-none">
                                <label for="password" class="absolute top-0 left-2 px-1 py-px text-xs text-gray-500">Mot de passe</label>
                            </div>
                            <small id="errorPassword"></small>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div>
                            <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                                <input name="passwordConfirm" id="passwordConfirm" class="bg-transparent text-black focus:outline-none">
                                <label for="passwordConfirm" class="absolute top-0 left-2 px-1 py-px text-xs text-gray-500">Confirmer le mot de passe</label>
                            </div>
                            <small id="errorPasswordConfirm"></small>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <textarea name="bio" id="bio" class="bg-transparent text-black focus:outline-none" maxlength="300" rows="5"></textarea>
                            <label for="bio" class="absolute top-0 left-2 px-1 py-px text-xs text-gray-500">Biographie</label>
                        </div>
                        <small id="errorBio"></small>
                    </div>
                </div>
                <div class="h-16" id="errorDisplay"></div>
                <button type="submit" class="px-1.5 py-2 rounded bg-gray-400 font-bold">
                    Modifier
                </button>
            </form>
        </div>
    </section>
    </article>
</main>
<footer>
    <?php require_once 'src/View/import/footer.php'; ?>
</footer>
</body>
</html>
