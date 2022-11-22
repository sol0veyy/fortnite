<?php

    require_once 'mysql.php';
    session_start();

    $text = filter_var(trim($_POST['text']));

    $result = $mysql -> query("SELECT * FROM `community` WHERE `id` = '{$_GET['com']}'");
    $resultCom = mysqli_fetch_array($result);

    $mysql -> query("INSERT INTO `article` (`user_id`, `text_article`, `community_id`, `name_com`) VALUES ('{$_SESSION['user']['id']}', '{$text}', '{$_GET['com']}', '{$resultCom['name']}')");

    header("Location: ../group.php?id={$_GET['com']}");
?>