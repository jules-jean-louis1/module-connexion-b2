<form action="" method="post" id="formRegister">
    <div>
        <div class="form_control flex flex-col">
            <input type="text" name="username" id="username" placeholder="Nom d'utilisateur">
            <small id="errorUsername" class="h-4"></small>
        </div>
        <div class="form_control flex flex-col">
            <input type="email" name="email" id="email" placeholder="Email">
            <small id="errorEmail" class="h-4"></small>
        </div>
    </div>
    <div>
        <div class="form_control flex flex-col">
            <input type="text" name="firstname" id="firstname" placeholder="Prénom">
            <small id="errorFirstname" class="h-4"></small>
        </div>
        <div class="form_control flex flex-col">
            <input type="text" name="lastname" id="lastname" placeholder="Nom">
            <small id="errorLastname" class="h-4"></small>
        </div>
    </div>
    <div>
        <div class="form_control flex flex-col">
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <small id="errorPassword" class="h-4"></small>
        </div>
        <div class="form_control flex flex-col">
            <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe">
            <small id="errorPasswordConfirm" class="h-4"></small>
        </div>
    </div>
    <div>
        <div id="errorDisplay" class="h-20"></div>
    </div>
    <button type="submit" class="p-2 bg-amber-400">Register</button>
</form>
