<?php

    session_start();
    require_once 'mysql.php';
    $delResult = mysqli_query($mysql, "DELETE FROM user WHERE `user`.`id` = '{$_SESSION['user']['id']}'");
    header('Location: ../auth.php')
?>