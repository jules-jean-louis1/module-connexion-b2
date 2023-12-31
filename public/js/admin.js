import {handleMenu, addLabelOnFocus, showError, showSuccess, convertDate, mobileMenu} from "./function/function.js";

const btnConnected = document.querySelector('#btnActionUser');

if (btnConnected) {
    handleMenu();
}
mobileMenu();

const btnUsername = document.querySelector('#btnUsername');
const btnEmail = document.querySelector('#btnEmail');
const btnFirstname = document.querySelector('#btnFirstname');
const btnLastname = document.querySelector('#btnLastname');
const btnRole = document.querySelector('#btnRole');
const btnCreatedAt = document.querySelector('#btnCreatedAt');
const btnUpdatedAt = document.querySelector('#btnUpdatedAt');
const btnEraseSearch = document.querySelector('#supprSearch');
const inputSearch = document.querySelector('#search');
const containerMessage = document.querySelector('#containerMessage');
let search = inputSearch.value;


let orderUsername = 'default';
let orderFirstname = 'default';
let orderLastname = 'default';
let orderRole = 'default';
let orderCreatedAt = 'default';
let orderUpdatedAt = 'default';

const svgUsername = document.querySelector('#svg_username');
const svgFirstname = document.querySelector('#svg_firstname');
const svgLastname = document.querySelector('#svg_lastname');
const svgRole = document.querySelector('#svg_role');
const svgCreatedAt = document.querySelector('#svg_created_at');
const svgUpdatedAt = document.querySelector('#svg_updated_at');
btnUsername.addEventListener('click', function () {
    orderUsername = orderUsername === 'default' ? 'desc' : 'asc';
    btnUsername.value = orderUsername;
    orderFirstname = 'default';
    orderLastname = 'default';
    orderRole = 'default';
    orderCreatedAt = 'default';
    orderUpdatedAt = 'default';


    svgUsername.setAttribute('stroke', '#0e1217')
    svgFirstname.setAttribute('stroke', '#d1d1d1')
    svgLastname.setAttribute('stroke', '#d1d1d1')
    svgRole.setAttribute('stroke', '#d1d1d1')
    svgCreatedAt.setAttribute('stroke', '#d1d1d1')
    svgUpdatedAt.setAttribute('stroke', '#d1d1d1')
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

    svgUsername.setAttribute('stroke', '#d1d1d1')
    svgFirstname.setAttribute('stroke', '#0e1217')
    svgLastname.setAttribute('stroke', '#d1d1d1')
    svgRole.setAttribute('stroke', '#d1d1d1')
    svgCreatedAt.setAttribute('stroke', '#d1d1d1')
    svgUpdatedAt.setAttribute('stroke', '#d1d1d1')
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

    svgUsername.setAttribute('stroke', '#d1d1d1')
    svgFirstname.setAttribute('stroke', '#d1d1d1')
    svgLastname.setAttribute('stroke', '#0e1217')
    svgRole.setAttribute('stroke', '#d1d1d1')
    svgCreatedAt.setAttribute('stroke', '#d1d1d1')
    svgUpdatedAt.setAttribute('stroke', '#d1d1d1')
});
btnRole.addEventListener('click', function () {
    orderRole = orderRole === 'default' ? 'desc' : 'asc';
    btnRole.value = orderRole;
    orderUsername = 'default';
    orderFirstname = 'default';
    orderLastname = 'default';
    orderCreatedAt = 'default';
    orderUpdatedAt = 'default';

    svgUsername.setAttribute('stroke', '#d1d1d1')
    svgFirstname.setAttribute('stroke', '#d1d1d1')
    svgLastname.setAttribute('stroke', '#d1d1d1')
    svgRole.setAttribute('stroke', '#0e1217')
    svgCreatedAt.setAttribute('stroke', '#d1d1d1')
    svgUpdatedAt.setAttribute('stroke', '#d1d1d1')
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

    svgUsername.setAttribute('stroke', '#d1d1d1')
    svgFirstname.setAttribute('stroke', '#d1d1d1')
    svgLastname.setAttribute('stroke', '#d1d1d1')
    svgRole.setAttribute('stroke', '#d1d1d1')
    svgCreatedAt.setAttribute('stroke', '#0e1217')
    svgUpdatedAt.setAttribute('stroke', '#d1d1d1')
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

    svgUsername.setAttribute('stroke', '#d1d1d1')
    svgFirstname.setAttribute('stroke', '#d1d1d1')
    svgLastname.setAttribute('stroke', '#d1d1d1')
    svgRole.setAttribute('stroke', '#d1d1d1')
    svgCreatedAt.setAttribute('stroke', '#d1d1d1')
    svgUpdatedAt.setAttribute('stroke', '#0e1217')
});

inputSearch.addEventListener('keyup', function () {
    search = inputSearch.value;
    if (search.length > 0) {
        btnEraseSearch.classList.remove('hidden');
        btnEraseSearch.addEventListener('click', function () {
            inputSearch.value = '';
            search = '';
            btnEraseSearch.classList.add('hidden');
            displayUsers();
        });
    } else {
        btnEraseSearch.classList.add('hidden');
    }

    displayUsers();
});

async function displayUsers() {
    const url = `${window.location.origin}/moduleconnexionb2/admin/users/${search}/${orderUsername}/${orderFirstname}/${orderLastname}/${orderRole}/${orderCreatedAt}/${orderUpdatedAt}`
    const response = await fetch(url);
    const data = await response.json();

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
        roleCell.innerHTML = `
        <form method="POST" id="formRole_${user.id}">
            <select name="role" id="role_${user.id}" class="form-select">
                <option value="user" ${role === 'Utilisateur' ? 'selected' : ''}>Utilisateur</option>
                <option value="admin" ${role === 'Administrateur' ? 'selected' : ''}>Administrateur</option>
            </select>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>`;
        roleCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const createdAtCell = document.createElement('td');
        createdAtCell.textContent = convertDate(user.created_at) === 'Invalid Date' ? 'Non renseigné' : convertDate(user.created_at);
        createdAtCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const updatedAtCell = document.createElement('td');
        updatedAtCell.textContent = user.updated_at === null ? 'Non renseigné' : convertDate(user.updated_at)
        updatedAtCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');

        const actionCell = document.createElement('td');
        actionCell.classList.add('text-center', 'align-middle', 'p-0.5', 'px-1.5', 'border', 'border-gray-200', 'hover:bg-gray-100', 'transition', 'duration-300');
        actionCell.innerHTML = `
        <button id="buttonDelete_${user.id}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"/>
                <path d="M22 22l-5 -5"/>
                <path d="M17 22l5 -5"/>
            </svg>
        </button>`;

        // Ajoutez les cellules à la ligne
        row.appendChild(idCell);
        row.appendChild(usernameCell);
        row.appendChild(emailCell);
        row.appendChild(firstnameCell);
        row.appendChild(lastnameCell);
        row.appendChild(roleCell);
        row.appendChild(createdAtCell);
        row.appendChild(updatedAtCell);
        row.appendChild(actionCell);
        containerUsersBody.appendChild(row);
        const buttonsDelete = document.querySelector(`#buttonDelete_${user.id}`);

        buttonsDelete.addEventListener('click', async () => {
            const response = await fetch(`/moduleconnexionb2/admin/users/${user.id}/delete`);
            const data = await response.json();
            if (data.success) {
                setTimeout(() => {
                    showSuccess('containerMessage', data.success);
                }, 2000);
                displayUsers();
            }
            if (data.error) {
                setTimeout(() => {
                    showError('containerMessage', data.error);
                }, 2000);
            }
        });
        const formRole = document.querySelector(`#formRole_${user.id}`);
        formRole.addEventListener('submit', async (e) => {
            e.preventDefault();
            const response = await fetch(`/moduleconnexionb2/admin/users/role/${user.id}`, {
                method: 'POST',
                body: new FormData(formRole)
            });
            const data = await response.json();
            if (data.success) {
                setTimeout(() => {
                    showSuccess('containerMessage', data.success);
                }, 2000);
                displayUsers();
            }
            if (data.error) {
                setTimeout(() => {
                    showError('containerMessage', data.error);
                }, 2000);
            }
        });
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