import {handleMenu, addLabelOnFocus} from "./function/function";

const btnConnected = document.querySelector('#btnActionUser');

if (btnConnected) {
    handleMenu();
}

// Declare variables
const username = document.querySelector('#username');
const email = document.querySelector('#email');
const firstname = document.querySelector('#firstname');
const lastname = document.querySelector('#lastname');
const password = document.querySelector('#password');
const passwordConfirm = document.querySelector('#passwordConfirm');
const bio = document.querySelector('#bio');

const editProfil = document.querySelector('#editProfil');

// Obtenez l'URL actuelle
const url = window.location.href;
let segments = url.split('/');
let idIndex = segments.indexOf('profil') + 1;
const id = segments[idIndex];

// Display Label

async function getUserInfos(id) {
    const response = await fetch(`${window.location.origin}/moduleconnexionb2/profil/${id}/info`);
    return await response.json();
}

function displayUserInfo() {
    getUserInfos(id).then(user => {
        username.value = user[0].username;
        email.value = user[0].email;
        firstname.value = user[0].firstname;
        lastname.value = user[0].lastname;
        bio.value = user[0].bio;
    });
}

displayUserInfo();

// Update user informations
editProfil.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
        const response = await fetch(`${window.location.origin}/moduleconnexionb2/profil/${id}/edit`, {
            method: 'POST',
            body: new FormData(editProfil)})
        const data = await response.json();
        console.log(data);
    } catch (error) {
        console.log(error);
    }
});