<?php

    // Отклонение заявки на добавления в друзья

    require_once 'mysql.php';
    session_start();

    $newFriend = $_GET['id'];

    $mysql -> query("DELETE FROM `requests_friend` WHERE user = {$_SESSION['user']['id']} AND friend = $newFriend");

    header("Location: ../friends.php?section=requests");
?>