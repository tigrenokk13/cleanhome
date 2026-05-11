const slides = document.querySelector('.slides');
const slideItems = document.querySelectorAll('.slide');
let index = 0;

function showSlide(i) {
    index = (i + slideItems.length) % slideItems.length;
    slides.style.transform = `translateX(-${index * 100}%)`;
}

document.getElementById('next').addEventListener('click', () => showSlide(index + 1));
document.getElementById('prev').addEventListener('click', () => showSlide(index - 1));

setInterval(() => showSlide(index + 1), 5000);