document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Дякуємо! Ваше повідомлення надіслано. Наш менеджер у Сумах зв\'яжеться з вами.');
    this.reset();
});
