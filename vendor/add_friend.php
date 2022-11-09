<?php

    session_start();
    require_once 'mysql.php';

    $login = $_POST['login'];

    $result = $mysql -> query("SELECT * FROM `user` WHERE login = '$login'");
    $friendID = mysqli_fetch_array($result); 

    $mysql -> query("INSERT INTO `user_friends` (`user`, `friend`) VALUES ('{$_SESSION['user']['id']}', '{$friendID['id']}')");

    header("Location: ../friends.php");

?>