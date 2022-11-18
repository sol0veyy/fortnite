<?php

    session_start();
    require_once 'mysql.php';
    $friend = $_GET['friend'];
    $text = $_GET['message'];

    $mysql -> query("INSERT INTO `message` (`user`, `friend`, `text`) VALUES ('{$_SESSION['user']['id']}', '$friend', '$text')");
    
    header("Location: ../friend_messages.php?id=$friend")
?>