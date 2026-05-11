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
    <title>Доставка та Оплата — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="oplata.css">
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
                    <span style="font-size: 14px; font-weight: 600; margin-right: 10px;">👋 <?php echo htmlspecialchars($userName); ?></span>
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
                <li><a href="oplata.php" class="active">Доставка</a></li>
                <li><a href="../kontakti/kontakti.php">Контакти</a></li>
            </ul>
        </div>
    </nav>
</header>

<main class="container">
    <section class="delivery-hero">
        <h1>Доставка та оплата</h1>
        <p>Ми робимо все, щоб ваші покупки доїхали вчасно та цілими</p>
    </section>

    <div class="delivery-grid">
        <div class="delivery-card">
            <div class="card-header">
                <i class="fa-solid fa-truck-fast"></i>
                <h2>Як ми доставляємо</h2>
            </div>
            <div class="card-body">
                <div class="delivery-method">
                    <h3>Самовивіз з магазину</h3>
                    <p>м. Суми, проспект Свободи, 13. Забирайте замовлення вже через 30 хвилин після підтвердження.</p>
                </div>
                <div class="delivery-method">
                    <h3>Нова Пошта</h3>
                    <p>Доставка у відділення або кур'єром до дверей. Вартість — за тарифами перевізника.</p>
                </div>
                <div class="delivery-method">
                    <h3>Укрпошта</h3>
                    <p>Економний варіант доставки по всій Україні. Термін: 3-5 робочих днів.</p>
                </div>
            </div>
        </div>

        <div class="delivery-card">
            <div class="card-header">
                <i class="fa-solid fa-credit-card"></i>
                <h2>Способи оплати</h2>
            </div>
            <div class="card-body">
                <div class="payment-method">
                    <h3>При отриманні</h3>
                    <p>Оплачуйте готівкою або карткою після перевірки товару в нашому магазині або на пошті.</p>
                </div>
                <div class="payment-method">
                    <h3>Онлайн на сайті</h3>
                    <p>Безпечна оплата через Visa/Mastercard, Apple Pay або Google Pay прямо в кошику.</p>
                </div>
                <div class="payment-method">
                    <h3>Безготівковий розрахунок</h3>
                    <p>Для юридичних осіб та ФОП надаємо повний пакет документів.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <p>CleanHome Premium © 2026 | Студент: Шелест Ігор ІТ-33</p>
</footer>

<script src="../main/shop_logic.js"></script>
</body>
</html>