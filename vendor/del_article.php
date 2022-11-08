<?php

    require_once 'mysql.php';
    session_start();

    $mysql -> query("DELETE FROM `article` WHERE id = {$_GET['article']}");

    header("Location: ../group.php?id={$_GET['com']}");

?>