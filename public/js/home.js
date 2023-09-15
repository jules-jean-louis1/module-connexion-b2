import {loginRegisterForm, handleMenu, mobileMenu, horloge} from "./function/function";

const btnLogin = document.querySelector('#login_register_header_btn');
const btnloginMobile = document.querySelector('#login_register_header_btn_menuMobile');
const btnConnected = document.querySelector('#btnActionUser');

if (btnLogin) {
    loginRegisterForm(btnLogin);
}
if (btnloginMobile) {
    loginRegisterForm(btnloginMobile);
}
if (btnConnected) {
    handleMenu();
}
mobileMenu();

horloge();

