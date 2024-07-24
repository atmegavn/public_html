document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const prevSlide = document.getElementById('prevSlide');
    const nextSlide = document.getElementById('nextSlide');
    let currentIndex = 0;

    function showSlide(index) {
        if (index >= slides.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = slides.length - 1;
        } else {
            currentIndex = index;
        }
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    prevSlide.addEventListener('click', function () {
        showSlide(currentIndex - 1);
    });

    nextSlide.addEventListener('click', function () {
        showSlide(currentIndex + 1);
    });
});
