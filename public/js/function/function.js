/* Function to Create Dialog */

function createDialog()
{
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
            const responseLogin = await fetch(`${window.location.origin}/moduleconnexion/login`);
            const dataLogin = await responseLogin.text();
            containerDiv.innerHTML = dataLogin;
            TextchangeLogin.textContent = "Vous n'avez pas de compte ?";
            const formLogin = document.querySelector('#formLogin');
            formLogin.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(formLogin);
                try {
                    const response = await fetch(`${window.location.origin}/moduleconnexion/login/submit`, {
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
            const responseRegister = await fetch(`${window.location.origin}/moduleconnexion/register`);
            const dataRegister = await responseRegister.text();
            containerDiv.innerHTML = dataRegister;
            TextchangeLogin.textContent = "Vous avez déjà un compte ?";
            const formRegister = document.querySelector('#formRegister');
            formRegister.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(formRegister);
                try {
                    const response = await fetch(`${window.location.origin}/moduleconnexion/register/submit`, {
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
        /* Change le formulaire en fonction du bouton cliqué */

        const buttonClose = document.querySelector('#buttonClose');
        buttonClose.addEventListener('click', () => {
            dialog.close();
        });
    });
}