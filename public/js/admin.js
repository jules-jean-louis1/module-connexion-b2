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

    const svgUsername = document.querySelector('#svg_username');
    svgUsername.setAttribute('stroke', '#0e1217')
    displayUsers();
});
btnFirstname.addEventListener('click', function () {
    orderFirstname = orderFirstname === 'default' ? 'desc' : 'asc';
    btnFirstname.value = orderFirstname;
    orderUsername = 'default';
    orderLastname = 'default';
    orderRole = 'default';
    orderCreatedAt = 'default';
    orderUpdatedAt = 'default';
    displayUsers();
});
btnLastname.addEventListener('click', function () {
    orderLastname = orderLastname === 'default' ? 'desc' : 'asc';
    btnLastname.value = orderLastname;
    orderUsername = 'default';
    orderFirstname = 'default';
    orderRole = 'default';
    orderCreatedAt = 'default';
    orderUpdatedAt = 'default';
    displayUsers();
});
btnRole.addEventListener('click', function () {
    orderRole = orderRole === 'default' ? 'desc' : 'asc';
    btnRole.value = orderRole;
    orderUsername = 'default';
    orderFirstname = 'default';
    orderLastname = 'default';
    orderCreatedAt = 'default';
    orderUpdatedAt = 'default';
    displayUsers();
});
btnCreatedAt.addEventListener('click', function () {
    orderCreatedAt = orderCreatedAt === 'default' ? 'desc' : 'asc';
    btnCreatedAt.value = orderCreatedAt;
    orderUsername = 'default';
    orderFirstname = 'default';
    orderLastname = 'default';
    orderRole = 'default';
    orderUpdatedAt = 'default';
    displayUsers();
});
btnUpdatedAt.addEventListener('click', function () {
    orderUpdatedAt = orderUpdatedAt === 'default' ? 'desc' : 'asc';
    btnUpdatedAt.value = orderUpdatedAt;
    orderUsername = 'default';
    orderFirstname = 'default';
    orderLastname = 'default';
    orderRole = 'default';
    orderCreatedAt = 'default';
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
        row.classList.add('text-center', 'align-middle', 'p-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');
        const role = user.role === 'admin' ? 'Administrateur' : 'Utilisateur';

        const idCell = document.createElement('td');
        idCell.textContent = user.id;
        // Créez des cellules de tableau pour chaque propriété de l'utilisateur
        const usernameCell = document.createElement('td');
        usernameCell.textContent = user.username;
        usernameCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const emailCell = document.createElement('td');
        emailCell.textContent = user.email;
        emailCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const firstnameCell = document.createElement('td');
        firstnameCell.textContent = user.firstname;
        firstnameCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const lastnameCell = document.createElement('td');
        lastnameCell.textContent = user.lastname;
        lastnameCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const roleCell = document.createElement('td');
        roleCell.textContent = role;
        roleCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const createdAtCell = document.createElement('td');
        createdAtCell.textContent = convertDate(user.created_at) === 'Invalid Date' ? 'Non renseigné' : convertDate(user.created_at);
        createdAtCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const updatedAtCell = document.createElement('td');
        updatedAtCell.textContent = user.updated_at === null ? 'Non renseigné' : convertDate(user.updated_at)
        updatedAtCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

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