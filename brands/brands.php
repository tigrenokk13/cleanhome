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
    <title>Бренди — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="brands.css">
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
                <li><a href="brands.php" class="active">Бренди</a></li>
                <li><a href="../dostavka/oplata.php">Доставка</a></li>
                <li><a href="../kontakti/kontakti.php">Контакти</a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="container">
    <section class="brands-hero">
        <h1>Наші партнери</h1>
        <p>Ми співпрацюємо лише з найкращими світовими виробниками косметики</p>
    </section>

    <div class="brands-grid">
        <div class="brand-card">
            <div class="brand-logo"><img src="../brand/loreal.png" alt="L'Oréal"></div>
            <div class="brand-info">
                <h3>L'Oréal Paris</h3>
                <p>Світовий лідер у галузі краси, що пропонує інноваційні продукти для макіяжу, догляду за шкірою та волоссям.</p>
            </div>
        </div>

        <div class="brand-card">
            <div class="brand-logo"><img src="../brand/la.jpg" alt="La Roche-Posay"></div>
            <div class="brand-info">
                <h3>La Roche-Posay</h3>
                <p>Дерматологічна косметика на основі термальної води для чутливої шкіри, рекомендована дерматологами.</p>
            </div>
        </div>

        <div class="brand-card">
            <div class="brand-logo"><img src="../brand/CeraVe.png" alt="CeraVe"></div>
            <div class="brand-info">
                <h3>CeraVe</h3>
                <p>Ефективні засоби для відновлення захисного бар'єру шкіри, розроблені спільно з провідними фахівцями.</p>
            </div>
        </div>

        <div class="brand-card">
            <div class="brand-logo"><img src="../brand/vichy.png" alt="Vichy"></div>
            <div class="brand-info">
                <h3>Vichy</h3>
                <p>Косметика, що поєднує силу термальної води та передові наукові розробки для здоров'я вашої шкіри.</p>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <p>CleanHome Premium © 2026 | Студент: Шелест Ігор ІТ-33</p>
</footer>

<script src="../main/shop_logic.js"></script>
</body>
</html>