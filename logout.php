<?php
session_start();
session_destroy();
header("Location: login.php"); // Перенаправляем обратно на страницу входа
exit();
?>
