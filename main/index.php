<?php 
require_once '../authorization/db.php'; 

$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : "Гість";
$isAdmin = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanHome Premium — Офіційний магазин</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if(isset($_GET['login']) && $_GET['login'] === 'success' && $isLoggedIn): ?>
    <div id="welcome-msg" style="background: #b2e8d5; color: #2c3e50; padding: 20px; text-align: center; font-size: 18px; font-weight: bold; position: fixed; top: 0; left: 0; width: 100%; z-index: 10000; box-shadow: 0 4px 15px rgba(0,0,0,0.2); animation: slideDown 0.5s ease-out;">
        <i class="fa-solid fa-circle-check"></i> 👋 Привіт, <?php echo htmlspecialchars($userName); ?>! Ви успішно увійшли в систему.
        <span onclick="this.parentElement.style.display='none'" style="margin-left: 30px; cursor: pointer; color: #e74c3c; font-size: 25px;">&times;</span>
    </div>
    <style>
        @keyframes slideDown { from { transform: translateY(-100%); } to { transform: translateY(0); } }
    </style>
<?php endif; ?>

<header class="main-header">
    <div class="header-top">
        <div class="container">
            <a href="index.php" class="logo">Clean<span>Home Premium</span></a>
            <div class="search-bar">
                <input type="text" id="liveSearch" placeholder="Пошук косметики чи брендів...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="user-actions">
                <a href="../koshik/cart.php" class="icon-link">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="count">0</span>
                </a>
                <?php if($isLoggedIn): ?>
                    <span style="font-size: 14px; font-weight: 600; color: #2c3e50;">👋 <?php echo htmlspecialchars($userName); ?></span>
                    <?php if($isAdmin): ?>
                        <a href="../admin/admin.php" class="auth-btn" style="background: #2c3e50; margin-left: 10px;">Адмін</a>
                    <?php endif; ?>
                    <a href="../authorization/logout.php" class="auth-btn" style="background: #ff7675; margin-left: 5px;">Вихід</a>
                <?php else: ?>
                    <a href="../authorization/auth.php" class="auth-btn">Вхід</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="main-nav">
        <div class="container">
            <ul>
                <li><a href="index.php" class="active">Головна</a></li>
                <li><a href="../brands/brands.php">Бренди</a></li>
                <li><a href="../dostavka/oplata.php">Доставка</a></li>
                <li><a href="../kontakti/kontakti.php">Контакти</a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="container layout">
    
    <?php if(!$isLoggedIn): ?>
        <div style="width: 100%; text-align: center; padding: 100px 20px; background: white; border-radius: 30px; box-shadow: var(--shadow); margin-top: 30px;">
            <i class="fa-solid fa-lock" style="font-size: 80px; color: #b2e8d5; margin-bottom: 20px;"></i>
            <h2 style="font-size: 32px; color: #2c3e50;">Каталог недоступний</h2>
            <p style="color: #7f8c8d; font-size: 18px; margin: 20px 0;">Для перегляду товарів та здійснення покупок необхідно авторизуватися.</p>
            <a href="../authorization/auth.php" class="auth-btn" style="padding: 15px 40px; font-size: 18px; display: inline-block;">Увійти або зареєструватися</a>
        </div>
    <?php else: ?>
        <aside class="sidebar">
            <div class="category-widget">
                <h3>Каталог</h3>
                <ul id="categoryList">
                    <li data-cat="all" class="active-cat"><i class="fa-solid fa-border-all"></i> Всі товари</li>
                    <?php 
                    $cat_res = mysqli_query($conn, "SELECT * FROM categories");
                    while($cat = mysqli_fetch_assoc($cat_res)): ?>
                        <li data-cat="<?php echo $cat['catid']; ?>">
                            <i class="fa-solid fa-check"></i> <?php echo $cat['catname']; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="filter-widget">
                <h3>Бюджет (грн)</h3>
                <div class="dual-price-inputs">
                    <div class="price-box">
                        <span>від</span>
                        <input type="number" id="minPriceInput" min="0" max="5000" value="0">
                    </div>
                    <div class="price-box">
                        <span>до</span>
                        <input type="number" id="maxPriceInput" min="0" max="5000" value="5000">
                    </div>
                </div>
                <input type="range" min="0" max="5000" value="5000" id="priceRange" class="main-slider">
            </div>
        </aside>

        <main class="content">
            <section class="promo-slider">
                <div class="slides">
                    <div class="slide"><img src="../Slider/slider_1.jpg" alt="Знижки"></div>
                    <div class="slide"><img src="../Slider/slider_2.jpg" alt="Новинки"></div>
                </div>
                <div class="slider-nav">
                    <button id="prev">❮</button>
                    <button id="next">❯</button>
                </div>
            </section>

            <h2 class="section-title">Наші товари</h2>
            <div class="product-grid" id="productGrid">
                <?php
                $products = mysqli_query($conn, "SELECT * FROM goods");
                while($item = mysqli_fetch_assoc($products)): 
                ?>
                    <div class="product-card" data-price="<?php echo $item['price']; ?>" data-category="<?php echo $item['catid']; ?>">
                        <div class="badge">SALE</div>
                        <div class="product-image-container" style="height: 180px; display: flex; align-items: center; justify-content: center; background: #fff; margin-bottom: 15px; border-radius: 15px;">
                            <img src="../Tovar/<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['namemodel']); ?>" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>
                        <div class="product-info">
                            <h4 style="margin-bottom: 5px; height: 40px; overflow: hidden;"><?php echo htmlspecialchars($item['namemodel']); ?></h4>
                            <p style="font-size: 0.75rem; color: #777; margin-bottom: 15px; height: 35px; overflow: hidden;">
                                <?php echo htmlspecialchars($item['description']); ?>
                            </p>
                            <div class="price"><?php echo $item['price']; ?> ₴</div>
                            
                            <div style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                                <button class="buy-btn" style="flex: 1;">До кошика</button>
                                <?php if($isAdmin): ?>
                                    <a href="../admin/edit.php?id=<?= $item['goodsid'] ?>" class="edit-gear" style="background: #f1f2f6; color: #2c3e50; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 12px; text-decoration: none;"><i class="fa-solid fa-gear"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </main>
    <?php endif; ?>

</div>

<footer class="footer">
    <p>CleanHome Premium © 2026 | Студент: Шелест Ігор ІТ-33</p>
</footer>

<script src="slider.js"></script>
<script src="shop_logic.js"></script>
</body>
</html>