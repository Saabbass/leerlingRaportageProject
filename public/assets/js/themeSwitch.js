document.getElementById('theme-toggle').addEventListener('click', function() {
    let body = document.body;
    body.classList.toggle('dark');
    document.cookie = `theme=${body.classList.contains('dark') ? 'dark' : 'light'}; path=/`;
});

// Apply the saved theme on page load
window.onload = function() {
    let theme = document.cookie.split('; ').find(row => row.startsWith('theme=')).split('=')[1];
    if (theme) {
        document.body.classList.add(theme);
    }
};
