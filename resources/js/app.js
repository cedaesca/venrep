import './bootstrap';
import * as bootstrap from 'bootstrap'

const handleNavbarLogout = () => {
    const $navbarLogout = document.getElementById('navbar-logout');
    const $logoutForm = document.getElementById('logout-form');

    $navbarLogout.addEventListener('click', (event) => {
        event.preventDefault();

        $logoutForm.submit();
    });
}

const initTooltips = () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    return tooltipList;
}

document.addEventListener('DOMContentLoaded', () => {
    handleNavbarLogout();
    initTooltips();
});