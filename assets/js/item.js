document.getElementById('myElement').addEventListener('touchstart', function() {
    this.style.transform = 'scale(1.1)';
});


document.getElementById('myElement').addEventListener('touchend', function() {
    this.style.transform = 'scale(1)';
});


document.addEventListener("DOMContentLoaded", function() {
    const pElement = document.querySelector(".hero");
    pElement.classList.add("animate__fadeInLeft");
});

document.addEventListener("DOMContentLoaded", function() {
    const pElement = document.querySelector(".hero-photo");
    pElement.classList.add("animate__fadeInLeft");
});