import {handleMenu, addLabelOnFocus, showError, convertDate} from "./function/function";

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

let orderUsername = 'default';
let orderFirstname = 'default';
let orderLastname = 'default';
let orderRole = 'default';
let orderCreatedAt = 'default';
let orderUpdatedAt = 'default';
btnUsername.addEventListener('click', function () {
    orderUsername = orderUsername === 'default' ? 'desc' : 'asc';
    btnUsername.value = orderUsername;
    orderFirstname = 'default';
    orderLastname = 'default';
    orderRole = 'default';
    orderCreatedAt = 'default';
    orderUpdatedAt = 'default';
    displayUsers();
});
btnFirstname.addEventListener('click', function () {
    orderFirstname = orderFirstname === 'default' ? 'desc' : 'asc';
    btnFirstname.value = orderFirstname;
    displayUsers();
});
btnLastname.addEventListener('click', function () {
    orderLastname = orderLastname === 'default' ? 'desc' : 'asc';
    btnLastname.value = orderLastname;
    displayUsers();
});
btnRole.addEventListener('click', function () {
    orderRole = orderRole === 'default' ? 'desc' : 'asc';
    btnRole.value = orderRole;
    displayUsers();
});
btnCreatedAt.addEventListener('click', function () {
    orderCreatedAt = orderCreatedAt === 'default' ? 'desc' : 'asc';
    btnCreatedAt.value = orderCreatedAt;
    displayUsers();
});
btnUpdatedAt.addEventListener('click', function () {
    orderUpdatedAt = orderUpdatedAt === 'default' ? 'desc' : 'asc';
    btnUpdatedAt.value = orderUpdatedAt;
    displayUsers();
});


async function displayUsers() {
    const url = `${window.location.origin}/moduleconnexionb2/admin/users/${orderUsername}/${orderFirstname}/${orderLastname}/${orderRole}/${orderCreatedAt}/${orderUpdatedAt}`
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    const containerUsersBody = document.querySelector('#containerUsersBody');
    containerUsersBody.innerHTML = '';
    data.forEach(user => {
        const row = document.createElement('tr');
        const role = user.role === 'admin' ? 'Administrateur' : 'Utilisateur';

        const idCell = document.createElement('td');
        idCell.textContent = user.id;
        // Créez des cellules de tableau pour chaque propriété de l'utilisateur
        const usernameCell = document.createElement('td');
        usernameCell.textContent = user.username;

        const emailCell = document.createElement('td');
        emailCell.textContent = user.email;

        const firstnameCell = document.createElement('td');
        firstnameCell.textContent = user.firstname;

        const lastnameCell = document.createElement('td');
        lastnameCell.textContent = user.lastname;

        const roleCell = document.createElement('td');
        roleCell.textContent = role;

        const createdAtCell = document.createElement('td');

        createdAtCell.textContent = convertDate(user.created_at);

        const updatedAtCell = document.createElement('td');
        updatedAtCell.textContent = convertDate(user.updated_at);

        // Ajoutez les cellules à la ligne
        row.appendChild(idCell);
        row.appendChild(usernameCell);
        row.appendChild(emailCell);
        row.appendChild(firstnameCell);
        row.appendChild(lastnameCell);
        row.appendChild(roleCell);
        row.appendChild(createdAtCell);
        row.appendChild(updatedAtCell);
        containerUsersBody.appendChild(row);
    });
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