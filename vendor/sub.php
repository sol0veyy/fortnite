<?php

    // Добавление/удаление нового подписчика в группе 
    session_start();

    require_once 'mysql.php';
    $result = $mysql -> query("SELECT COUNT(*) FROM `com_sub` WHERE `com_id` = {$_GET['idCom']}");
    $upSub = mysqli_fetch_array($result);

    if ($upSub['COUNT(*)'] == 0) {
        $mysql -> query("INSERT INTO `com_sub` (`id`, `com_id`, `user_id`) VALUES (NULL, '{$_GET['idCom']}', '{$_SESSION['user']['id']}')");
    } else {
        $mysql -> query("DELETE FROM `com_sub` WHERE `com_id` = {$_GET['idCom']} AND `user_id` = {$_SESSION['user']['id']}");
    }

    $resultSub = $mysql -> query("SELECT COUNT(1) FROM `com_sub` WHERE `com_id` = {$_GET['idCom']}");
    $colSub = mysqli_fetch_array($resultSub);
    echo $colSub['COUNT(1)'];

?>