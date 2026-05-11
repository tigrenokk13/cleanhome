<?php
require_once '../authorization/db.php';

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['namemodel']);
    $price = (int)$_POST['price'];
    $catid = (int)$_POST['catid'];
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $img = mysqli_real_escape_string($conn, $_POST['image']);

    $sql = "INSERT INTO goods (namemodel, price, catid, description, image) 
            VALUES ('$name', $price, $catid, '$desc', '$img')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php");
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати товар — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../main/style.css">
    <style>
        .form-container { max-width: 600px; margin: 50px auto; background: white; padding: 40px; border-radius: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .form-container h2 { margin-bottom: 25px; border-left: 5px solid #b2e8d5; padding-left: 15px; color: #2c3e50; }
        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #7f8c8d; }
        input, select, textarea { width: 100%; padding: 12px 15px; border: 2px solid #f0f0f0; border-radius: 12px; font-size: 15px; transition: 0.3s; }
        input:focus, select:focus, textarea:focus { border-color: #b2e8d5; outline: none; background: #f9fdfc; }
        .submit-btn { background: #2c3e50; color: white; border: none; padding: 15px; border-radius: 12px; cursor: pointer; font-weight: bold; width: 100%; margin-top: 10px; transition: 0.3s; }
        .submit-btn:hover { background: #b2e8d5; color: #2c3e50; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #95a5a6; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body style="background: #fcfdfd;">

    <div class="form-container">
        <h2><i class="fa-solid fa-box-open"></i> Новий товар</h2>
        <form method="POST">
            <div class="input-group">
                <label>Назва моделі</label>
                <input type="text" name="namemodel" placeholder="Наприклад: Ariel pods 3in1" required>
            </div>
            
            <div style="display: flex; gap: 20px;">
                <div class="input-group" style="flex: 1;">
                    <label>Ціна (грн)</label>
                    <input type="number" name="price" placeholder="450" required>
                </div>
                <div class="input-group" style="flex: 1;">
                    <label>Категорія</label>
                    <select name="catid">
                        <?php 
                        $cats = mysqli_query($conn, "SELECT * FROM categories");
                        while($c = mysqli_fetch_assoc($cats)) echo "<option value='{$c['catid']}'>{$c['catname']}</option>";
                        ?>
                    </select>
                </div>
            </div>

            <div class="input-group">
                <label>Назва файлу картинки (з папки Tovar)</label>
                <input type="text" name="image" placeholder="ariel.jpg" required>
            </div>

            <div class="input-group">
                <label>Опис товару</label>
                <textarea name="description" rows="4" placeholder="Короткий опис товару..."></textarea>
            </div>

            <button type="submit" name="add_product" class="submit-btn">Додати в каталог</button>
            <a href="admin.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Назад до списку</a>
        </form>
    </div>

</body>
</html>