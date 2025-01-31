<?php
session_start();
if (isset($_SESSION['user'])) {
    header("feedback.php");
    exit();
} else {
    header("login.php");
    exit();
}
?>