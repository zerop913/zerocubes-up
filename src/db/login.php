<?php

require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if(empty($login) || empty($pass))
{
    echo '<script>alert("Заполните все поля"); window.location.href = "../login.html";</script>';
} else {
    $sql = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
            session_start();
            $_SESSION['username'] = $row['login'];
            echo '<script>alert("Добро пожаловать, '.$row['login'].'!"); window.location.href = "../index.html";</script>';
        }
    } else {
        echo '<script>alert("Нет такого пользователя"); window.location.href = "../login.html";</script>';
    }
}

?>