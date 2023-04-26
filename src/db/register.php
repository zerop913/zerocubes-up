<?php

require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];

if (empty($login) || empty($pass) || empty($repeatpass)) {
    // выводим всплывающее уведомление в случае, если какое-то из полей пустое
    echo '<script>alert("Заполните все поля"); window.location.href = "../registration.html";</script>';
} else {
    if($pass != $repeatpass){
        echo '<script>alert("Пароли не совпадают"); window.location.href = "../registration.html";</script>';
    } else {
        $sql = "INSERT INTO users (login, pass) VALUES ('$login', '$pass')"; // Remove quotes around the table name 'users'
        if ($conn->query($sql) === TRUE){
            session_start();
            $_SESSION['username'] = $login;
            // выводим всплывающее уведомление об успешной регистрации
            echo '<script>alert("Вы успешно зарегистрировались!"); window.location.href = "../login.html";</script>';
        } 
        else {
            echo '<script>alert("Ошибка при регистрации, попробуйте еще раз"); window.location.href = "../registration.html";</script>';
        }
    } 
}

?>

