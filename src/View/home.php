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
    <link rel="icon" href="./public/icones/logo-1.png" type="image/x-icon">
    <title>Module.co - Accueil</title>
</head>
<body>
    <header>
        <?php require_once 'src/View/import/header.php'; ?>
    </header>
    <main class="h-[92vh]">
        <div id="containerFormLoginRegister"></div>
        <div id="dialogModal_Overlay"></div>
        <section class="clock_midle">
            <div id="clock" class="text-4xl p-3 border rounded border-[#ac1de4]  hover:drop-shadow-[0_20px_20px_rgba(172,29,228,0.30)] font-bold px-4"></div>
        </section>
        <section id="mainContainerHome" class="flex justify-between h-full">
            <div id="left90degresponsive" class="flex items-center">
                <h3 class="text-4xl uppercase">Homepage</h3>
                <div class="w-10 bg-gray-600" id="barre_dialog"></div>
            </div>
            <div class="flex items-end" id="title_Homepage">
                <div id="bottomPageTitle" class="flex flex-col items-end playfair_display">
                    <div class="font-bold uppercase lg:text-[9rem] text-[3rem] mb:text-[4rem] lg:-mt-6 lg:-mb-9">module</div>
                    <div class="font-bold uppercase lg:text-[9rem]  text-[3rem] mb:text-[4rem] lg:-mt-6 lg:-mb-9">de connexion</div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php require_once 'src/View/import/footer.php'; ?>
    </footer>
</body>
</html>
