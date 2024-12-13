import './bootstrap';
import 'alpinejs';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');

    function showLoadingScreen() {
        loadingScreen.style.display = 'flex';
    }

    function hideLoadingScreen() {
        loadingScreen.style.display = 'none';
    }

    // Show loading screen when the page starts loading
    window.addEventListener('beforeunload', showLoadingScreen);

    // Hide loading screen when the page has fully loaded
    window.addEventListener('load', hideLoadingScreen);
});