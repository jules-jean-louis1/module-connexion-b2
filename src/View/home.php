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
    <title>Module.co</title>
</head>
<body>
    <header>
        <?php require_once 'src/View/import/header.php'; ?>
    </header>
    <main class="h-[92vh]">
        <div id="containerFormLoginRegister"></div>
        <div id="dialogModal_Overlay"></div>
        <section id="mainContainerHome" class="flex justify-between h-full">
            <div id="left90degresponsive" class="flex items-center">
                <h3 class="text-4xl uppercase">Homepage</h3>
                <div class="w-10 bg-gray-600" id="barre_dialog"></div>
            </div>
            <div class="flex items-end" id="title_Homepage">
                <div id="bottomPageTitle" class="flex flex-col items-end playfair_display">
                    <div class="font-bold uppercase text-[9rem] lg:-mt-6 lg:-mb-9">module</div>
                    <div class="font-bold uppercase text-[9rem] lg:-mt-6 lg:-mb-9">de connexion</div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php require_once 'src/View/import/footer.php'; ?>
    </footer>
</body>
</html>
