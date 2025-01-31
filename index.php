<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: feedback/feedback.php");
    exit();
} else {
    header("Location: auth/login.php");
    exit();
}
?>