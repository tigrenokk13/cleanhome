document.addEventListener('DOMContentLoaded', () => {
    const btnLogin = document.getElementById('btn-login');
    const btnRegister = document.getElementById('btn-register');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');


    btnLogin.addEventListener('click', () => {
        btnLogin.classList.add('active');
        btnRegister.classList.remove('active');
        
        loginForm.classList.add('active-form');
        registerForm.classList.remove('active-form');
    });

    // Перемикання на РЕЄСТРАЦІЮ (Залишаємо — це візуал)
    btnRegister.addEventListener('click', () => {
        btnRegister.classList.add('active');
        btnLogin.classList.remove('active');
        
        registerForm.classList.add('active-form');
        loginForm.classList.remove('active-form');
    });


    /*
    // Обробка форми входу через JS більше не потрібна
    loginForm.addEventListener('submit', (e) => {
        // e.preventDefault(); 
        // alert('Вхід успішний!');
        // window.location.href = '../main/index.html';
    });

    registerForm.addEventListener('submit', (e) => {
        // e.preventDefault(); // Це блокувало відправку на PHP
        // const pass = document.getElementById('regPass').value;
        // const confirm = document.getElementById('regPassConfirm').value;

        // if (pass !== confirm) {
        //     alert('Паролі не збігаються!');
        //     return;
        // }

        // alert('Реєстрація успішна! Тепер увійдіть у систему.');
        // btnLogin.click(); 
    });
    */
});