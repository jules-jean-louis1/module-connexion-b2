<div id="containerHeader" class="hidden md:block">
    <nav class="flex justify-between items-center p-4  border-b border-[#52586633]">
        <div id="containerLogo" class="flex space-x-2">
            <a href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                </svg>
            </a>
            <span class="playfair_display">Module-Co</span>
        </div>
        <div>
            <ul class="flex items-center space-x-6">
                <li>
                    <a href="">Docs</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
                <li>
                    <a href="">Projets</a>
                </li>
            </ul>
        </div>
        <div id="containerBtnActionUser">
            <?php if (isset($_SESSION['user'])) : ?>
                <div class="relative">
                    <button id="btnActionUser" class="py-1.5 bg-gray-400 border-[#a8b3cf33] px-4 rounded text-white">
                        <div class="flex items-center space-x-2">
                            <img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/images/avatars/' . $_SESSION['user']['avatar']; ?>" alt="avatar" class="w-8 h-8 rounded-full">
                            <p class="font-bold"><?=$_SESSION['user']['username'];?></p>
                        </div>
                    </button>
                    <div id="containerActionUser" class="absolute right-0 w-36 bg-gray-400 rounded border-[1px] border-[#a8b3cf33] shadow-lg z-10 hidden text-white">
                        <ul class="flex flex-col justify-around h-full">
                            <li>
                                <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/moduleconnexionb2/profil/'.$_SESSION['user']['id']; ?>">
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/moduleconnexionb2/logout'; ?>">
                                    Déconnexion
                                </a>
                            </li>
                            <?php if ($_SESSION['user']['role'] === 'admin') : ?>
                                <li>
                                    <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/moduleconnexionb2/admin'; ?>">
                                        Admin
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <div>
            <?php else : ?>
                <div>
                    <button id="login_register_header_btn" class="py-1.5 bg-gray-400 border-[#a8b3cf33] px-4 rounded text-white" type="button">
                        Connexion
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</div>

