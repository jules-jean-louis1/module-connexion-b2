import {handleMenu} from "./function/function";

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

// Get informations from the user

// Obtenez l'URL actuelle
const url = window.location.href;
let segments = url.split('/');
let idIndex = segments.indexOf('profil') + 1;
const id = segments[idIndex];

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