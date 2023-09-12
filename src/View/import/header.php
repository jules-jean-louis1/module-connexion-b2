<div id="containerHeader" class="py-3 hidden md:block">
    <nav class="flex justify-between items-center px-6">
        <div>
            <ul class="flex-1"
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

