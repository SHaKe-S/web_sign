<?php
require_once ('db.php'); //подключаем бд

$login = $_POST['login'];//создаем перепенные
$pass = $_POST['pass'];//данные вводим из формы html

if (empty($login) || empty($pass)) //проверяем на пустоту
{
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `users` WHERE login = '$login' AND pass = '$pass'"; //проверить на соответсвие из базы данных
    $result = $conn->query($sql);

    if ($result->num_rows > 0) //проверяем если получит больше 0 строк тогда выводим все данные
   {
    while ($row = $result->fetch_assoc()){
        echo "Добро пожаловать ". $row['login']; // получаем доступ
    }
   } else {
        echo "Нет такого пользователя"; // если нет совпадений то не заходит
   }
}