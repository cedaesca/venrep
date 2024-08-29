import './bootstrap';
import * as bootstrap from 'bootstrap'

document.addEventListener('DOMContentLoaded', () => {
    const $navbarLogout = document.getElementById('navbar-logout');
    const $logoutForm = document.getElementById('logout-form');

    $navbarLogout.addEventListener('click', (event) => {
        event.preventDefault();

        $logoutForm.submit();
    });
});