<?php
require_once '../authorization/db.php';

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM goods WHERE goodsid = $id");
    header("Location: admin.php");
}

$result = mysqli_query($conn, "SELECT g.*, c.catname FROM goods g JOIN categories c ON g.catid = c.catid");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Адмін-панель — CleanHome Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../main/style.css">
    <style>
        .admin-container { padding: 40px; max-width: 1100px; margin: 0 auto; }
        .admin-table { width: 100%; background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border-collapse: collapse; }
        .admin-table th { background: #b2e8d5; color: #2c3e50; padding: 15px; text-align: left; }
        .admin-table td { padding: 15px; border-bottom: 1px solid #f0f0f0; }
        .btn-edit { color: #3498db; text-decoration: none; font-weight: bold; }
        .btn-del { color: #e74c3c; text-decoration: none; font-weight: bold; margin-left: 10px; }
        .add-link { display: inline-block; padding: 12px 25px; background: #2c3e50; color: white; border-radius: 12px; text-decoration: none; margin-bottom: 20px; transition: 0.3s; }
        .add-link:hover { background: #b2e8d5; color: #2c3e50; }
    </style>
</head>
<body style="background: #fcfdfd;">

    <div class="admin-container">
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1 style="border-left: 5px solid #b2e8d5; padding-left: 15px;">Управління магазином</h1>
            <a href="../main/index.php" class="auth-btn">На сайт</a>
        </header>

        <a href="add_product.php" class="add-link"><i class="fa-solid fa-plus"></i> Додати новий товар</a>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Назва</th>
                    <th>Категорія</th>
                    <th>Ціна</th>
                    <th style="text-align: center;">Дії</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($row['namemodel']) ?></strong></td>
                    <td><span style="background: #e8f7f2; padding: 5px 10px; border-radius: 8px; font-size: 12px;"><?= $row['catname'] ?></span></td>
                    <td><?= $row['price'] ?> ₴</td>
                    <td style="text-align: center;">
                        <a href="edit.php?id=<?= $row['goodsid'] ?>" class="btn-edit"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="admin.php?delete=<?= $row['goodsid'] ?>" class="btn-del" onclick="return confirm('Видалити цей товар?')"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>