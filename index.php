<?php
session_start();

// Проверка, если пользователь авторизован
if (isset($_SESSION['user'])) {
    // Если авторизован, перенаправляем на страницу с формой обратной связи
    header("Location: feedback.php");
    exit();
} else {
    // Если не авторизован, перенаправляем на страницу входа
    header("Location: login.php");
    exit();
}
?>
