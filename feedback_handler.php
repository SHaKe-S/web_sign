<?php
require_once('db.php');
session_start();

// Проверка, что пользователь залогинен
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $source = trim($_POST['source']);

    // Получаем id пользователя из сессии
    $sql = "SELECT id FROM users WHERE login = :login";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['login' => $_SESSION['user']]);
    $user = $stmt->fetch();

    if ($user) {
        // Вставляем данные в таблицу feedback
        $sql = "INSERT INTO feedback (user_id, name, message, source) VALUES (:user_id, :name, :message, :source)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'user_id' => $user['id'],
            'name' => $name,
            'message' => $message,
            'source' => $source
        ]);

        // Редирект на страницу подтверждения или на ту же страницу с сообщением
        header("Location: feedback.php?status=success");
        exit();
    } else {
        die("Пользователь не найден");
    }
}
?>
