<?php

    session_start();
    require_once 'mysql.php';

    $login = $_POST['login'];

    $result = $mysql -> query("SELECT * FROM `user` WHERE login = '$login'");
    $friendID = mysqli_fetch_array($result); 
    $resultInfoRequest = $mysql -> query("SELECT * FROM `requests_friend` WHERE `user` = '{$friendID['id']}' AND `friend` = '{$_SESSION['user']['id']}'");
    $infoRequest = mysqli_fetch_array($resultInfoRequest);

    if ($infoRequest['user'] !== $friendID['id']) {
        $mysql -> query("INSERT INTO `requests_friend` (`user`, `friend`) VALUES ('{$friendID['id']}', '{$_SESSION['user']['id']}')");
    };

    header("Location: ../friends.php");

?>