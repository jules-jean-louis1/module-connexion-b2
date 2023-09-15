import {loginRegisterForm, handleMenu, mobileMenu} from "./function/function";

const btnLogin = document.querySelector('#login_register_header_btn');
const btnConnected = document.querySelector('#btnActionUser');

if (btnLogin) {
    loginRegisterForm(btnLogin);
}
if (btnConnected) {
    handleMenu();
}
mobileMenu();