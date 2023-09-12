<div id="containerHeader" class="py-3 hidden md:block">
    <nav class="flex justify-between items-center px-6">
        <div>
            <ul class="flex items-center space-x-6">
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
                <li>
                    <a href="">A propos</a>
                </li>
            </ul>
        </div>
        <div id="containerBtnActionUser">
            <?php if (isset($_SESSION['user'])) : ?>
                <div>
                    <div class="flex items-center space-x-2">
                        <a href="profil.php">
                            <img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/moduleconnexionb2/public/images/avatars/' . $_SESSION['user']['avatar']; ?>" alt="avatar" class="w-10 h-10 rounded-full">
                        </a>
                        <p><?=$_SESSION['user']['username'];?></p>
                    </div>
                    <button id="logout_header_btn" class="p-2 bg-amber-400">Déconnexion</button>
                </div>
            <?php else : ?>
                <div>
                    <button id="login_register_header_btn" class="p-2 bg-amber-400">Connexion</button>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</div>

