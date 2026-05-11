<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід та Реєстрація — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="auth_style.css">
</head>
<body>

<header class="main-header">
    <div class="header-top">
        <div class="container">
            <a href="../main/index.php" class="logo">Clean<span>Home Premium</span></a>
            <div class="user-actions">
                <a href="../koshik/cart.php" class="icon-link">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="count">0</span>
                </a>
                <a href="auth.php" class="auth-btn active-auth">Вхід</a>
            </div>
        </div>
    </div>
    <nav class="main-nav">
        <div class="container">
            <ul>
                <li><a href="../main/index.php">Головна</a></li>
                <li><a href="../brands/brands.php">Бренди</a></li>
                <li><a href="../dostavka/oplata.php">Доставка</a></li>
                <li><a href="../kontakti/kontakti.php">Контакти</a></li>
            </ul>
        </div>
    </nav>
</header>

<main class="auth-container">
    <div class="auth-box">
        <div class="auth-tabs">
            <button class="tab-btn active" id="btn-login">Вхід</button>
            <button class="tab-btn" id="btn-register">Реєстрація</button>
        </div>

        <form id="loginForm" class="auth-form active-form" action="auth_handler.php" method="POST">
            <input type="hidden" name="login_action" value="1">
            <h2>З поверненням!</h2>
            
            <?php if(isset($_GET['registered'])): ?>
                <p style="color: #2ecc71; background: #e8f7f2; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                    Реєстрація успішна! Увійдіть у свій акаунт.
                </p>
            <?php endif; ?>

            <?php if(isset($_GET['error'])): ?>
                <p style="color: #e74c3c; background: #fdeaea; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                    Невірний email або пароль!
                </p>
            <?php endif; ?>

            <p>Введіть свої дані для входу</p>
            <div class="input-wrap">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-wrap">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
            <button type="submit" class="submit-btn">Увійти</button>
            <a href="#" class="forgot-pass">Забули пароль?</a>
        </form>

        <form id="registerForm" class="auth-form" action="auth_handler.php" method="POST">
            <input type="hidden" name="register_action" value="1">
            <h2>Створити акаунт</h2>
            <p>Приєднуйтесь до CleanHome Premium</p>
            <div class="input-wrap">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="name" placeholder="Ваше ім'я" required>
            </div>
            <div class="input-wrap">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-wrap">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" name="phone" placeholder="Номер телефону" required>
            </div>
            <div class="input-wrap">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
            <div class="input-wrap">
                <i class="fa-solid fa-shield-halved"></i>
                <input type="password" name="password_confirm" placeholder="Підтвердіть пароль" required>
            </div>
            <button type="submit" class="submit-btn">Зареєструватися</button>
        </form>
    </div>
</main>

<footer class="footer">
    <p>CleanHome Premium © 2026 | Студент: Шелест Ігор ІТ-33</p>
</footer>

<script src="auth_script.js"></script>
</body>
</html>