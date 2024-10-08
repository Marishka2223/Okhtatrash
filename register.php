<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO users (login, password, fio, phone, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$login, $password, $fio, $phone, $email]);

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Регистрация</h1>
        <form method="post">
            <input type="text" name="login" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="text" name="fio" placeholder="ФИО" required>
            <input type="text" name="phone" placeholder="Телефон" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
    </div>
</body>
</html>
