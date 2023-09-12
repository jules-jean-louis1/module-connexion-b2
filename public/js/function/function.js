/* Label Animation */
function addLabelOnFocus(inputElement, labelFor, labelText) {
    inputElement.addEventListener('focusin', function () {
        const labelElement = document.createElement('label');
        labelElement.setAttribute('for', labelFor);
        labelElement.textContent = labelText;
        labelElement.setAttribute('class', 'absolute top-0 text-gray-500 text-sm font-light text-grey-500 transition-all duration-300 ease-in-out');
        inputElement.setAttribute('placeholder', '');
        const formControlDiv = this.parentElement;
        formControlDiv.insertBefore(labelElement, this);
    });
    // Ajoutez un gestionnaire d'événements pour le focusout sur l'input (pour le supprimer)
    inputElement.addEventListener('focusout', function () {
        const labelElement = this.parentElement.querySelector('label');

        if (labelElement) {
            labelElement.remove();
            inputElement.setAttribute('placeholder', labelText);
        }
    });
}
/* Function error Handler */
function showError(smallSelector, message){
    const small = document.getElementById(smallSelector);
    small.setAttribute("class", "text-red-500 text-sm font-bold")
    small.innerHTML = '';
    small.textContent = message;
}

/* Function to Create Dialog */

function createDialog()
{
    const containerForm = document.querySelector('#containerFormLoginRegister');
    const dialog = document.createElement("dialog");
    dialog.setAttribute("id", "dialog");
    dialog.setAttribute("class", "w-[26.25rem] h-[55%] bg-[#202225] border-[1px] border-[#a8b3cf33] rounded-[14px] shadow-lg z-50");
    dialog.innerHTML = '';

    const divBottom = document.createElement("div");
    divBottom.setAttribute("id", "divBottom");
    divBottom.setAttribute("class", "w-full flex items-center justify-center bg-[#202225] border-t-[1px] border-t-[#a8b3cf33] text-white rounded-b-[14px]");
    divBottom.innerHTML = `
            <div class="w-full flex items-center justify-center">
                <p class="text-sm" id="TextchangeLogin">Vous n'avez pas de compte ?</p>
                <button type="button" id="buttonLogin" class="p-4 bg-red rounded-lg">S'inscrire</button>
            </div>
        `;
    const Div = document.createElement("div");
    Div.setAttribute("id", "DivModifyText");
    Div.setAttribute("class", "py-2 px-4 w-full flex items-center justify-between bg-[#202225] border-b-[1px] border-b-[#a8b3cf33] text-white font-semibold text-lg rounded-t-[14px]");
    const Para = document.createElement("p")
    Para.setAttribute("id", "ParaModifyText");
    Para.textContent = "Se connecter à votre compte";

    const buttonClose = document.createElement("button");
    buttonClose.innerHTML = `
            <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 pointer-events-none"><path d="M16.804 6.147a.75.75 0 011.049 1.05l-.073.083L13.061 12l4.72 4.72a.75.75 0 01-.977 1.133l-.084-.073L12 13.061l-4.72 4.72-.084.072a.75.75 0 01-1.049-1.05l.073-.083L10.939 12l-4.72-4.72a.75.75 0 01.977-1.133l.084.073L12 10.939l4.72-4.72.084-.072z" fill="currentcolor" fill-rule="evenodd"></path></svg>
        `;
    buttonClose.setAttribute("id", "buttonClose");
    buttonClose.setAttribute("type", "button");
    buttonClose.setAttribute("class", "font-bold cursor-pointer select-none focus-outline justify-center flex z-1 rounded-[12px] hover:bg-[#a8b3cf1f]");

    const Divflex1 = document.createElement("div");
    Divflex1.setAttribute("class", "flex flex-1");

    const containerDiv = document.createElement("div");
    containerDiv.setAttribute("id", "containerDiv");
    containerDiv.setAttribute("class", "flex justify-center w-full h-[78%]");

    dialog.appendChild(Div);
    Div.appendChild(Para);
    Div.appendChild(buttonClose);
    dialog.appendChild(containerDiv);
    dialog.appendChild(Divflex1);
    dialog.appendChild(divBottom);
    containerForm.appendChild(dialog);
}




/* Function to Register Login */
export async function loginRegisterForm(btnLogin)
{
    const containerForm = document.querySelector('#containerFormLoginRegister');
    containerForm.innerHTML = '';
    createDialog();

    const dialog = document.querySelector('#dialog');
    const containerDiv = document.querySelector('#containerDiv');
    btnLogin.addEventListener('click', async () => {
        dialog.setAttribute("open", "");
        const buttonLogin = document.querySelector('#buttonLogin');
        const ParaModifyText = document.getElementById("ParaModifyText");
        const TextchangeLogin = document.getElementById("TextchangeLogin");
        /* Récupere le formulaire de connexion */
        async function Login() {
            const responseLogin = await fetch(`${window.location.origin}/moduleconnexionb2/login`);
            const dataLogin = await responseLogin.text();
            containerDiv.innerHTML = '';
            containerDiv.innerHTML = dataLogin;
            TextchangeLogin.textContent = "Vous n'avez pas de compte ?";
            buttonLogin.textContent = "S'inscrire";
            // Animation Label
            const inputLogin = document.querySelector('#email');
            const inputPassword = document.querySelector('#password');
            addLabelOnFocus(inputLogin, 'login', 'Nom d\'utilisateur / Email');
            addLabelOnFocus(inputPassword, 'password', 'Mot de passe');
            const formLogin = document.querySelector('#login-form');
            formLogin.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(formLogin);
                try {
                    const response = await fetch(`${window.location.origin}/moduleconnexionb2/login/submit`, {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();
                    console.log(data);
                } catch (error) {
                    console.log(error);
                }
            });
        }
        /* Récupere le formulaire d'inscription */
        async function Register() {
            const responseRegister = await fetch(`${window.location.origin}/moduleconnexionb2/register`);
            const dataRegister = await responseRegister.text();
            containerDiv.innerHTML = '';
            containerDiv.innerHTML = dataRegister;
            TextchangeLogin.textContent = "Vous avez déjà un compte ?";
            buttonLogin.textContent = "Se connecter";
            // Animation Label
            const inputUsername = document.querySelector('#username');
            const inputEmail = document.querySelector('#email');
            const inputFirstname = document.querySelector('#firstname');
            const inputLastname = document.querySelector('#lastname');
            const inputPassword = document.querySelector('#password');
            const inputPasswordConfirm = document.querySelector('#passwordConfirm');
            const formRegister = document.querySelector('#formRegister');
            addLabelOnFocus(inputUsername, 'username', 'Nom d\'utilisateur');
            addLabelOnFocus(inputEmail, 'email', 'Email');
            addLabelOnFocus(inputFirstname, 'firstname', 'Prénom');
            addLabelOnFocus(inputLastname, 'lastname', 'Nom');
            addLabelOnFocus(inputPassword, 'password', 'Mot de passe');
            addLabelOnFocus(inputPasswordConfirm, 'passwordConfirm', 'Confirmer le mot de passe');

            formRegister.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(formRegister);
                try {
                    const response = await fetch(`${window.location.origin}/moduleconnexionb2/register/submit`, {
                        method: 'POST',
                        body: formData
                    });
                    const data = await response.json();

                    const errorDisplay = document.getElementById('errorDisplay');
                    if (data.email) {
                        showError('errorEmail', data.email);
                    }
                    if (data.username) {
                        showError('errorUsername', data.username);
                    }
                    if (data.password) {
                        showError('errorPassword', data.password);
                    }
                    if (data.passwordConfirm) {
                        showError('errorPasswordConfirm', data.passwordConfirm);
                    }
                    if (data.firstname) {
                        showError('errorFirstname', data.firstname);
                    }
                    if (data.lastname) {
                        showError('errorLastname', data.lastname);
                    }
                    if (data.success) {
                        errorDisplay.innerHTML = '';
                        errorDisplay.innerHTML = `
                        <div role="alert" class="flex p-3 border border-[#000000] border-l-4 flex-row border-l-[#FF0100] rounded-[16px] mt-6">
                            <span class="block sm:inline">
                                <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 pointer-events-none mr-2 text-theme-status-error"><defs><clipPath id="outlined_svg__a"><path fill="currentcolor" d="M11.541.514a4 4 0 011.4 1.317l.126.209 5.58 9.92a4 4 0 01-3.23 5.953l-.256.008H4a4 4 0 01-3.605-5.733l.119-.228 5.58-9.92A4 4 0 0111.541.514zM7.92 2.887l-.082.133-5.58 9.92a2 2 0 001.594 2.976L4 15.92h11.16a2 2 0 001.815-2.841l-.071-.14-5.58-9.92a2 2 0 00-3.405-.133zM9.58 11.92a1 1 0 110 2 1 1 0 010-2zm0-7a1 1 0 011 1v4a1 1 0 11-2 0v-4a1 1 0 011-1z"></path></clipPath></defs><g clip-path="url(#outlined_svg__a)" fill="currentcolor" transform="translate(2.42 3.079)"><path d="M0 0h19.161v17.921H0V0z"></path></g></svg>
                            </span>
                            <p class="flex-1 !mt-0 typo-callout mt-3">${data.success}</p>
                        </div>`;
                        setTimeout(() => {
                            Register();
                        }, 2000);
                    }
                    if (data.useUsername) {
                        errorDisplay.innerHTML = '';
                        errorDisplay.innerHTML = `
                        <div role="alert" class="flex p-3 border border-[#000000] border-l-4 flex-row border-l-[#FF0100] rounded-[16px] mt-6">
                            <span class="block sm:inline">
                                <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 pointer-events-none mr-2 text-theme-status-error"><defs><clipPath id="outlined_svg__a"><path fill="currentcolor" d="M11.541.514a4 4 0 011.4 1.317l.126.209 5.58 9.92a4 4 0 01-3.23 5.953l-.256.008H4a4 4 0 01-3.605-5.733l.119-.228 5.58-9.92A4 4 0 0111.541.514zM7.92 2.887l-.082.133-5.58 9.92a2 2 0 001.594 2.976L4 15.92h11.16a2 2 0 001.815-2.841l-.071-.14-5.58-9.92a2 2 0 00-3.405-.133zM9.58 11.92a1 1 0 110 2 1 1 0 010-2zm0-7a1 1 0 011 1v4a1 1 0 11-2 0v-4a1 1 0 011-1z"></path></clipPath></defs><g clip-path="url(#outlined_svg__a)" fill="currentcolor" transform="translate(2.42 3.079)"><path d="M0 0h19.161v17.921H0V0z"></path></g></svg>
                            </span>
                            <p class="flex-1 !mt-0 typo-callout mt-3">${data.useUsername}</p>
                        </div>`;
                    }
                    if (data.useEmail) {
                        errorDisplay.innerHTML = '';
                        errorDisplay.innerHTML = `
                        <div role="alert" class="flex p-3 border border-[#000000] border-l-4 flex-row border-l-[#FF0100] rounded-[16px] mt-6">
                            <span class="block sm:inline">
                                <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 pointer-events-none mr-2 text-theme-status-error"><defs><clipPath id="outlined_svg__a"><path fill="currentcolor" d="M11.541.514a4 4 0 011.4 1.317l.126.209 5.58 9.92a4 4 0 01-3.23 5.953l-.256.008H4a4 4 0 01-3.605-5.733l.119-.228 5.58-9.92A4 4 0 0111.541.514zM7.92 2.887l-.082.133-5.58 9.92a2 2 0 001.594 2.976L4 15.92h11.16a2 2 0 001.815-2.841l-.071-.14-5.58-9.92a2 2 0 00-3.405-.133zM9.58 11.92a1 1 0 110 2 1 1 0 010-2zm0-7a1 1 0 011 1v4a1 1 0 11-2 0v-4a1 1 0 011-1z"></path></clipPath></defs><g clip-path="url(#outlined_svg__a)" fill="currentcolor" transform="translate(2.42 3.079)"><path d="M0 0h19.161v17.921H0V0z"></path></g></svg>
                            </span>
                            <p class="flex-1 !mt-0 typo-callout mt-3">${data.useEmail}</p>
                        </div>`;
                    }
                    console.log(data);
                } catch (error) {
                    console.log(error);
                }
            });
        }
        /* Change le formulaire en fonction du bouton cliqué */
        Login();
        buttonLogin.addEventListener('click', () => {
            if(buttonLogin.textContent == "S'inscrire") {
                ParaModifyText.textContent = "S'inscrire sur le site";
                Register();
            } else {
                ParaModifyText.textContent = "Se connecter à votre compte";
                buttonLogin.textContent = "Se connecter";
                Login();
            }
        });

        const buttonClose = document.querySelector('#buttonClose');
        buttonClose.addEventListener('click', () => {
            dialog.close();
        });
    });
}