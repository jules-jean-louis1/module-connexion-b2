import {handleMenu, addLabelOnFocus, showError} from "./function/function";

const btnConnected = document.querySelector('#btnActionUser');

if (btnConnected) {
    handleMenu();
}

const btnUsername = document.querySelector('#btnUsername');
const btnEmail = document.querySelector('#btnEmail');
const btnFirstname = document.querySelector('#btnFirstname');
const btnLastname = document.querySelector('#btnLastname');
const btnRole = document.querySelector('#btnRole');
const btnCreatedAt = document.querySelector('#btnCreatedAt');
const btnUpdatedAt = document.querySelector('#btnUpdatedAt');

let orderUsername = 'asc';
let orderEmail = 'asc';
let orderFirstname = 'asc';
let orderLastname = 'asc';
let orderRole = 'asc';
let orderCreatedAt = 'asc';
let orderUpdatedAt = 'asc';
btnUsername.addEventListener('click', function () {
    orderUsername = orderUsername === 'asc' ? 'desc' : 'asc';
    btnUsername.value = orderUsername;
    displayUsers();
});
btnEmail.addEventListener('click', function () {
    orderEmail = orderEmail === 'asc' ? 'desc' : 'asc';
    btnEmail.value = orderEmail;
    return orderEmail;
});
btnFirstname.addEventListener('click', function () {
    orderFirstname = orderFirstname === 'asc' ? 'desc' : 'asc';
    btnFirstname.value = orderFirstname;
    return orderFirstname;
});
btnLastname.addEventListener('click', function () {
    orderLastname = orderLastname === 'asc' ? 'desc' : 'asc';
    btnLastname.value = orderLastname;
    return orderLastname;
});
btnRole.addEventListener('click', function () {
    orderRole = orderRole === 'asc' ? 'desc' : 'asc';
    btnRole.value = orderRole;
    return orderRole;
});
btnCreatedAt.addEventListener('click', function () {
    orderCreatedAt = orderCreatedAt === 'asc' ? 'desc' : 'asc';
    btnCreatedAt.value = orderCreatedAt;
    return orderCreatedAt;
});
btnUpdatedAt.addEventListener('click', function () {
    orderUpdatedAt = orderUpdatedAt === 'asc' ? 'desc' : 'asc';
    btnUpdatedAt.value = orderUpdatedAt;
    return orderUpdatedAt;
});

let usernameValue = btnUsername.value;
let emailValue = btnEmail.value;
let firstnameValue = btnFirstname.value;
let lastnameValue = btnLastname.value;
let roleValue = btnRole.value;
let createdAtValue = btnCreatedAt.value;
let updatedAtValue = btnUpdatedAt.value;

async function displayUsers() {
    if (usernameValue !== 'default') {
        emailValue = 'default';
        firstnameValue = 'default';
        lastnameValue = 'default';
        roleValue = 'default';
        createdAtValue = 'default';
        updatedAtValue = 'default';
    }
    if (emailValue !== 'default') {
        usernameValue = 'default';
        firstnameValue = 'default';
        lastnameValue = 'default';
        roleValue = 'default';
        createdAtValue = 'default';
        updatedAtValue = 'default';
    }
    if (firstnameValue !== 'default') {
        usernameValue = 'default';
        emailValue = 'default';
        lastnameValue = 'default';
        roleValue = 'default';
        createdAtValue = 'default';
        updatedAtValue = 'default';
    }
    if (lastnameValue !== 'default') {
        usernameValue = 'default';
        emailValue = 'default';
        firstnameValue = 'default';
        roleValue = 'default';
        createdAtValue = 'default';
        updatedAtValue = 'default';
    }
    if (roleValue !== 'default') {
        usernameValue = 'default';
        emailValue = 'default';
        firstnameValue = 'default';
        lastnameValue = 'default';
        createdAtValue = 'default';
        updatedAtValue = 'default';
    }
    if (createdAtValue !== 'default') {
        usernameValue = 'default';
        emailValue = 'default';
        firstnameValue = 'default';
        lastnameValue = 'default';
        roleValue = 'default';
        updatedAtValue = 'default';
    }
    if (updatedAtValue !== 'default') {
        usernameValue = 'default';
        emailValue = 'default';
        firstnameValue = 'default';
        lastnameValue = 'default';
        roleValue = 'default';
        createdAtValue = 'default';
    }


    const response = await fetch(`${window.location.origin}/moduleconnexionb2/admin/users/${usernameValue}/${firstnameValue}/${lastnameValue}/${roleValue}/${createdAtValue}/${updatedAtValue}`);
    const data = await response.json();
    console.log(data);
}
function resetValues(currentButton) {
    const buttons = [btnUsername, btnEmail, btnFirstname, btnLastname, btnRole, btnCreatedAt, btnUpdatedAt];

    // Réinitialiser toutes les valeurs à "default" sauf celle du bouton actuel
    buttons.forEach((button) => {
        if (button !== currentButton) {
            button.value = 'default';
        }
    });
}
displayUsers();