<?php

    // Принятие заявки на добавления в друзья

    require_once 'mysql.php';
    session_start();

    $newFriend = $_GET['id'];

    $mysql -> query("DELETE FROM `requests_friend` WHERE user = {$_SESSION['user']['id']} AND friend = $newFriend");
    $mysql -> query("INSERT INTO `user_friends` (`user`, `friend`) VALUES ('{$_SESSION['user']['id']}', '$newFriend')");
    $mysql -> query("INSERT INTO `user_friends` (`user`, `friend`) VALUES ('$newFriend', '{$_SESSION['user']['id']}')");

    header("Location: ../friends.php?section=requests");
?>