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
    <section>
        <form action="" method="post" id="editProfil">
            <div>
                <div>
                    <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                        <input type="text" name="username" id="username" class="bg-transparent text-black focus:outline-none">
                    </div>
                    <small id="errorUsername"></small>
                </div>
            </div>
            <div>
                <div>
                    <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                        <input name="email" id="email" class="bg-transparent text-black focus:outline-none">
                    </div>
                    <small id="errorEmail"></small>
                </div>
            </div>
            <div class="flex space-x-2">
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <input name="firstname" id="firstname" class="bg-transparent text-black focus:outline-none">
                        </div>
                        <small id="errorFirstname"></small>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <input name="lastname" id="lastname" class="bg-transparent text-black focus:outline-none">
                        </div>
                        <small id="errorLastname"></small>
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <input name="password" id="password" class="bg-transparent text-black focus:outline-none">
                        </div>
                        <small id="errorPassword"></small>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                            <input name="passwordConfirm" id="passwordConfirm" class="bg-transparent text-black focus:outline-none">
                        </div>
                        <small id="errorPasswordConfirm"></small>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div class="form_control flex relative rounded-14 flex-row items-center bg-[#a8b3cf14] h-12 px-4 overflow-hidden border-2 border-[#000] rounded cursor-text">
                        <textarea name="bio" id="bio" class="bg-transparent text-black focus:outline-none"></textarea>
                    </div>
                    <small id="errorBio"></small>
                </div>
            </div>
            <button type="submit">Modifier</button>
        </form>
    </section>
</main>
<footer>
    <?php require_once 'src/View/import/footer.php'; ?>
</footer>
</body>
</html>
