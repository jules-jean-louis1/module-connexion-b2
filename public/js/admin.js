import {handleMenu, addLabelOnFocus, showError} from "./function/function";

const btnConnected = document.querySelector('#btnActionUser');

if (btnConnected) {
    handleMenu();
}

async function getAllUsers() {
    const response = await fetch(`${window.location.origin}/moduleconnexionb2/admin/users`);
    return await response.json();
}

console.log(getAllUsers());

const btnUsername = document.querySelector('#btnUsername');

let sortOrder = 'asc';
btnUsername.addEventListener('click', function () {
    // Inversez l'état à chaque clic
    sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';

    // Mettez à jour la valeur du bouton
    btnUsername.value = sortOrder;
    console.log(sortOrder);

});
