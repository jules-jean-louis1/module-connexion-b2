<form action="" method="post" id="login-form" class="bg-[#251821] h-full max-h-[calc(100vh-2.5rem)] mobileL:h-[40rem] mobileL:max-h-[calc(100vh-5rem)] w-[26.25rem] px-4 py-5 flex flex-col justify-around text-white">
    <div class="flex items-center bg-[#292226] rounded">
        <span class="text-2xl font-bold">
            <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 pointer-events-none"><path d="M16.667 4.5a4.833 4.833 0 014.828 4.618l.005.215v5.33a4.833 4.833 0 01-4.618 4.829l-.215.005H8.333a4.833 4.833 0 01-4.828-4.618l-.005-.216v-5.33a4.833 4.833 0 014.618-4.828l.215-.005h8.334zm0 1.5H8.333a3.333 3.333 0 00-3.328 3.15L5 9.333v5.33a3.333 3.333 0 003.15 3.329l.183.005h8.334a3.333 3.333 0 003.328-3.15l.005-.184v-5.33a3.333 3.333 0 00-3.15-3.328L16.667 6zm1.68 3.396c.269.42.175 1-.21 1.294l-5.03 3.846a1 1 0 01-1.215 0l-5.03-3.846c-.384-.294-.478-.874-.208-1.294.27-.42.8-.522 1.185-.228l4.66 3.564 4.662-3.564c.385-.294.916-.192 1.185.228z" fill="currentcolor" fill-rule="evenodd"></path></svg>
        </span>
        <div class="flex flex-col flex-1 items-start max-w-full mr-2">
            <input type="text" name="email" id="email" placeholder="Nom d'utilisateur / Email" class="text-white focus:outline-none w-full bg-transparent">
        </div>
        <small id="errorEmail" class="flex items-center h-4 text-red-500 px-2 my-1 "></small>
    </div>

    <div class="relative">
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="border border-[#FFFFFF7F] p-2 text-white bg-transparent rounded  focus:outline-none w-full">
        <small id="errorPassword" class="flex items-center h-4 text-red-500 px-2 my-1 "></small>
    </div>
    <div id="containerMessageProfil" class="h-[55px] w-full">
        <div id="errorDisplay" class="w-full"></div>
    </div>
    <div id="containerSubmit" class="w-full">
        <button type="submit" name="submit" id="submit" class="p-2 rounded bg-[#a87ee6] font-semibold text-white w-full">Connexion</button>
    </div>
</form>
