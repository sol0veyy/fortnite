<?php

    session_start();
    require_once 'mysql.php';

    $login = $_POST['login'];

    $result = $mysql -> query("SELECT * FROM `user` WHERE login = '$login'");
    $friendID = mysqli_fetch_array($result); 

    $mysql -> query("INSERT INTO `requests_friend` (`user`, `friend`) VALUES ('{$friendID['id']}', '{$_SESSION['user']['id']}')");

    header("Location: ../friends.php");

?>