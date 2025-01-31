<?php
require_once('db.php');
session_start();

// Проверяем авторизацию пользователя
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2>Форма обратной связи</h2>
<form action="feedback_handler.php" method="post" class="mb-3">
    <input type="text" class="form-control mb-2" placeholder="Ваше имя" name="name" required>
    <textarea class="form-control mb-2" placeholder="Ваше сообщение" name="message" required></textarea>
    <label>Как вы узнали о нас?</label>
    <select name="source" class="form-control mb-2">
        <option>Интернет</option>
        <option>Рекомендации</option>
        <option>Реклама</option>
    </select>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<a href="logout.php" class="btn btn-danger">Выйти</a>
</body>
</html>
