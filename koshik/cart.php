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
    <title>Кошик — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="cart.css">
</head>
<body>

<header class="main-header">
    <div class="header-top">
        <div class="container">
            <a href="../main/index.php" class="logo">Clean<span>Home Premium</span></a>
            <div class="user-actions">
                <a href="cart.php" class="icon-link active-link">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="count" id="cartCount">0</span>
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
                <li><a href="../kontakti/kontakti.php">Контакти</a></li>
            </ul>
        </div>
    </nav>
</header>

<main class="container">
    <section class="cart-section">
        <h1>Ваш кошик</h1>
        
        <div class="cart-container" id="cartContainer">
            <div class="cart-items" id="cartItems">
                </div>

            <div class="cart-summary" id="cartSummary">
                <h3>Підсумок замовлення</h3>
                <div class="summary-row">
                    <span>Товари:</span>
                    <span id="totalItems">0</span>
                </div>
                <div class="summary-row total">
                    <span>Загальна сума:</span>
                    <span id="totalPrice">0 ₴</span>
                </div>
                <button class="checkout-btn" id="checkoutBtn">Оформити замовлення</button>
                <button class="clear-btn" id="clearCart">Очистити кошик</button>
            </div>
        </div>

        <div id="emptyMessage" style="display:none; text-align:center; padding: 50px;">
            <i class="fa-solid fa-cart-shopping" style="font-size: 50px; color: #b2e8d5; margin-bottom: 20px;"></i>
            <p>Ваш кошик порожній</p>
            <a href="../main/index.php" class="back-link" style="color: #b2e8d5; text-decoration: none; font-weight: bold;">Повернутися до покупок</a>
        </div>
    </section>
</main>

<footer class="footer">
    <p>CleanHome Premium © 2026 | Студент: Шелест Ігор ІТ-33</p>
</footer>

<script src="cart.js"></script>
<script src="../main/shop_logic.js"></script>
</body>
</html>