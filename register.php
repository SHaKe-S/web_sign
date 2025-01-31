<?php
require_once('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);
    $repeatpass = trim($_POST['repeatpass']);
    $email = trim($_POST['email']);

    // Проверка на пустые поля
    if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) {
        die("Заполните все поля");
    }

    // Проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Некорректный email");
    }

    // Проверка совпадения паролей
    if ($pass !== $repeatpass) {
        die("Пароли не совпадают");
    }

    // Хешируем пароль
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Используем подготовленные запросы для защиты от SQL-инъекций
    $sql = "INSERT INTO users (login, pass, email) VALUES (:login, :pass, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['login' => $login, 'pass' => $hashedPass, 'email' => $email]);

    // После регистрации редирект на логин
    header("Location: login.php");
    exit();
}

?>