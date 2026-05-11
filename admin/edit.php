<?php
require_once '../authorization/db.php';

$id = (int)$_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM goods WHERE goodsid = $id");
$product = mysqli_fetch_assoc($res);

if (isset($_POST['update_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['namemodel']);
    $price = (int)$_POST['price'];
    $catid = (int)$_POST['catid'];
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query($conn, "UPDATE goods SET namemodel='$name', price=$price, catid=$catid, description='$desc' WHERE goodsid=$id");
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагування товару</title>
    <link rel="stylesheet" href="../main/style.css"> <style>
        .edit-form { max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 10px; }
        .save-btn { background: #b2e8d5; border: none; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body style="background: #fcfdfd;">
    <div class="edit-form">
        <h2>Редагувати: <?= htmlspecialchars($product['namemodel']) ?></h2>
        <form method="POST">
            <input type="text" name="namemodel" value="<?= htmlspecialchars($product['namemodel']) ?>" required>
            <input type="number" name="price" value="<?= $product['price'] ?>" required>
            
            <select name="catid">
                <?php 
                $cats = mysqli_query($conn, "SELECT * FROM categories");
                while($c = mysqli_fetch_assoc($cats)): ?>
                    <option value="<?= $c['catid'] ?>" <?= ($c['catid'] == $product['catid']) ? 'selected' : '' ?>>
                        <?= $c['catname'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <textarea name="description" rows="5"><?= htmlspecialchars($product['description']) ?></textarea>
            <button type="submit" name="update_product" class="save-btn">Зберегти зміни</button>
            <a href="admin.php" style="display: block; text-align: center; margin-top: 10px; color: #777;">Скасувати</a>
        </form>
    </div>
</body>
</html>