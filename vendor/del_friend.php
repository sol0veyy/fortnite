<?php

    // Удаление друга из друзей 

    require_once 'mysql.php';
    session_start();

    $friend = $_GET['id'];

    $mysql -> query("DELETE FROM `user_friends` WHERE user = {$_SESSION['user']['id']} AND friend = $friend");
    $mysql -> query("DELETE FROM `user_friends` WHERE user = $friend AND friend = {$_SESSION['user']['id']}");

    header("Location: ../friends.php");

?>