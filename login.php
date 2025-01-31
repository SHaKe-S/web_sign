<?php
require_once('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);

    // Проверяем, заполнены ли все поля
    if (empty($login) || empty($pass)) {
        die("Заполните все поля");
    }

    // Получаем данные пользователя из базы
    $sql = "SELECT * FROM users WHERE login = :login";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['login' => $login]);
    $user = $stmt->fetch();

    // Проверяем пароль
    if ($user && password_verify($pass, $user['pass'])) {
        $_SESSION['user'] = $user['login'];
        header("Location: feedback.php"); // Перенаправляем на форму обратной связи
        exit();
    } else {
        echo "Неверный логин или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
    <h2>Вход</h2>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="pass" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
    <a href="register.php">Зарегистрироваться</a>
</body>
</html>