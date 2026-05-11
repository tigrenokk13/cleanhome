<?php 
require_once '../authorization/db.php'; 

$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : "Вхід";
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакти — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="kontakti.css">
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
                <?php if($isLoggedIn): ?>
                    <span style="font-size: 14px; font-weight: 600; margin-right: 10px;">👋 <?php echo $userName; ?></span>
                    <a href="../authorization/logout.php" class="auth-btn" style="background: #ff7675;">Вихід</a>
                <?php else: ?>
                    <a href="../authorization/auth.php" class="auth-btn">Вхід</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="main-nav">
        <div class="container">
            <ul>
                <li><a href="../main/index.php">Головна</a></li>
                <li><a href="../brands/brands.php">Бренди</a></li>
                <li><a href="../dostavka/oplata.php">Доставка</a></li>
                <li><a href="kontakti.php" class="active">Контакти</a></li>
            </ul>
        </div>
    </nav>
</header>

<main class="container">
    <section class="contact-hero">
        <h1>Зв'яжіться з нами</h1>
        <p>Наш офіс та магазин знаходяться в самому серці міста</p>
    </section>

    <div class="contact-grid">
        <div class="contact-info">
            <div class="info-card">
                <i class="fa-solid fa-location-dot"></i>
                <div>
                    <h3>Адреса</h3>
                    <p>м. Суми, проспект Свободи, 13</p>
                </div>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <h3>Телефони</h3>
                    <p>+38 (050) 123-45-67</p>
                    <p>+38 (067) 890-12-34</p>
                </div>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-envelope"></i>
                <div>
                    <h3>Email</h3>
                    <p>info@cleanhome.sumy.ua</p>
                </div>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-clock"></i>
                <div>
                    <h3>Графік роботи</h3>
                    <p>Пн-Пт: 09:00 – 19:00</p>
                    <p>Сб-Нд: 10:00 – 17:00</p>
                </div>
            </div>
        </div>

        <div class="feedback-form">
            <form id="contactForm">
                <h2>Напишіть нам</h2>
                <div class="input-group">
                    <input type="text" placeholder="Ваше ім'я" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <textarea placeholder="Ваше повідомлення" rows="5" required></textarea>
                </div>
                <button type="submit" class="send-btn">Надіслати повідомлення</button>
            </form>
        </div>
    </div>

    <div class="map-box">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2514.456637385614!2d34.801123!3d50.910672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x412903e108151817%3A0x62964e05da39572c!2sProspekt%20Svobody%2C%2013%2C%20Sumy%2C%20Sums&#39;ka%20oblast%2C%2040000!5e0!3m2!1sen!2sua!4v1715360000000!5m2!1sen!2sua" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</main>

<footer class="footer">
    <p>CleanHome Premium © 2026 | Студент: Шелест Ігор ІТ-33 (СумДУ)</p>
</footer>

<script src="kontakti.js"></script>
<script src="../main/shop_logic.js"></script>
</body>
</html>