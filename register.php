<?php
    require_once('db.php');//подключаем базу данных
$login = $_POST['login']; // создаем значения и присваиваем им переменные
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

//проверка на пустоту
if (empty($login) || empty ($pass) || empty($repeatpass) || empty ($email)){
    echo "Заполните все поля";
} else
{
    if($pass != $repeatpass){ //проверка на соответсвие пароля
        echo "Пароли не совпадают";
    } else {
            $sql = "INSERT INTO `users` (login, pass, email) VALUES ('$login','$pass','$email')";//отправляем данные в базу данных
            if ($conn -> query($sql) === TRUE){ //проверка на документацию
                echo "Успешная регистрация";
            }
            else {
                echo "Ошибка: ". $conn->error;
            }

        }
}