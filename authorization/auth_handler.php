<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['register_action'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: auth.php?registered=success");
            exit();
        } else {
            echo "Помилка запису: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['login_action'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: ../admin/admin.php");
            } else {
                header("Location: ../main/index.php?login=success");
            }
            exit();
        } else {
            header("Location: auth.php?error=wrong_data");
            exit();
        }
    }
}
?>