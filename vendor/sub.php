<?php

    // Добавление/удаление нового подписчика в группе 
    session_start();

    require_once 'mysql.php';
    $result = $mysql -> query("SELECT COUNT(*) FROM `com_sub` WHERE `com_id` = {$_GET['idCom']} AND `user_id` = {$_SESSION['user']['id']}");
    $upSub = mysqli_fetch_array($result);

    if ($upSub['COUNT(*)'] == 0) {
        $mysql -> query("INSERT INTO `com_sub` (`id`, `com_id`, `user_id`) VALUES (NULL, '{$_GET['idCom']}', '{$_SESSION['user']['id']}')");
    } else {
        $mysql -> query("DELETE FROM `com_sub` WHERE `com_id` = {$_GET['idCom']} AND `user_id` = {$_SESSION['user']['id']}");
    }

    $resultSub = $mysql -> query("SELECT COUNT(1) FROM `com_sub` WHERE `com_id` = {$_GET['idCom']}");
    $colSub = mysqli_fetch_array($resultSub);

    if (end($colSub) == 1) {
        $text = "подписчик";
    } else if (end($colSub) == 2 || end($colSub) == 3 || end($colSub) == 4) {
        $text = "подписчика";
    } else {
        $text = "подписчиков";
    }

    $mysql -> query("UPDATE `com_sub` SET `text` = '{$text}' WHERE `com_id` = {$_GET['idCom']};"); 
    $resultText = $mysql -> query("SELECT * FROM `com_sub` WHERE `com_id` = {$_GET['idCom']}");
    $textSub = mysqli_fetch_array($resultText);

    echo $colSub['COUNT(1)'];
    echo " ";
    echo $textSub['text'];   

?>