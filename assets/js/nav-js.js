document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('mouseover', function() {
            link.classList.add('hover');
        });

        link.addEventListener('mouseout', function() {
            link.classList.remove('hover');
        });

        link.addEventListener('click', function() {
            navLinks.forEach(nav => nav.classList.remove('active'));
            link.classList.add('active');
        });
    });
});