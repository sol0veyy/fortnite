<?php

    // Добавление друга в список сообщений

    session_start();
    require_once 'mysql.php';
    $friend = $_GET['id'];

    $result = $mysql -> query("SELECT * FROM `messagesfriends` WHERE `user` = '{$_SESSION['user']['id']}' AND `friend` = '$friend'");
    $infoFriend = mysqli_fetch_array($result);

    if ($infoFriend['friend'] !== $friend) {
        $mysql -> query("INSERT INTO `messagesfriends` (`user`, `friend`) VALUES ('{$_SESSION['user']['id']}', '$friend')");
        $mysql -> query("INSERT INTO `messagesfriends` (`user`, `friend`) VALUES ('$friend', '{$_SESSION['user']['id']}')");
    };

    header("Location: ../friend_messages.php?id=$friend");

?>