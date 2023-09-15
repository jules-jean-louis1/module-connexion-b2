import {handleMenu, addLabelOnFocus, showError, convertDate} from "./function/function";

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

// Small Tags
const usernameSmall = document.querySelector('#errorUsername');
const emailSmall = document.querySelector('#errorEmail');
const firstnameSmall = document.querySelector('#errorFirstname');
const lastnameSmall = document.querySelector('#errorLastname');
const passwordSmall = document.querySelector('#errorPassword');
const passwordConfirmSmall = document.querySelector('#errorPasswordConfirm');
const bioSmall = document.querySelector('#errorBio');

const editProfil = document.querySelector('#editProfil');


const titlePage = document.querySelector('title');
const username_top = document.querySelector('#username_top');
const role_top = document.querySelector('#role_top');
const joined_top = document.querySelector('#joined_top');

// Obtenez l'URL actuelle
const url = window.location.href;
let segments = url.split('/');
let idIndex = segments.indexOf('profil') + 1;
const id = segments[idIndex];

// Display Label

async function getUserInfos(id) {
    const response = await fetch(`/moduleconnexionb2/profil/${id}/info`);
    return await response.json();
}

function displayUserInfo() {
    getUserInfos(id).then(user => {
        username.value = user[0].username;
        titlePage.innerHTML = `${user[0].username} - Profil`;
        email.value = user[0].email;
        firstname.value = user[0].firstname;
        lastname.value = user[0].lastname;
        bio.value = user[0].bio;

        username_top.innerHTML = user[0].username;
        role_top.innerHTML = user[0].role === 'admin' ? 'Administrateur' : 'Utilisateur';
        joined_top.innerHTML = 'Inscrit le ' + convertDate(user[0].created_at);
    });
}

displayUserInfo();

// Update user informations
editProfil.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
        const response = await fetch(`/moduleconnexionb2/profil/${id}/edit`, {
            method: 'POST',
            body: new FormData(editProfil)})
        const data = await response.json();
        console.log(data);
        const display = document.querySelector('#errorDisplay');
        if (data.username) {
            username.classList.add('is-invalid');
            showError('errorUsername', data.username);
        }
        if (data.email) {
            email.classList.add('is-invalid');
            showError('errorEmail', data.email);
        }
        if (data.firstname) {
            firstname.classList.add('is-invalid');
            showError('errorFirstname', data.firstname);
        }
        if (data.lastname) {
            lastname.classList.add('is-invalid');
            showError('errorLastname', data.lastname);
        }
        if (data.password) {
            password.classList.add('is-invalid');
            showError('errorPassword', data.password);
        }
        if (data.passwordConfirm || data.error_password) {
            passwordConfirm.classList.add('is-invalid');
            showError('errorPasswordConfirm', data.passwordConfirm);
        }
        if (data.bio) {
            bio.classList.add('is-invalid');
            showError('errorPasswordConfirm', data.bio);
        }
        if (data.success) {
            const success = data.success;
            for (const key in success) {
                if (success.hasOwnProperty(key)) {
                    const message = success[key];
                    display.innerHTML += `
                <p class="text-center">${message}</p>`;
                }
            }
            setTimeout(() => {
                display.innerHTML = '';
                displayUserInfo();
            }, 5000);
        }
        if (data.length === 0) {
            display.innerHTML = `
                    <p class="text-center">Aucune modification n'a été apporté</p>`;
            setTimeout(() => {
                display.innerHTML = '';
            }, 5000);
        }
    } catch (error) {
        console.log(error);
    }
});

// add profile informations
