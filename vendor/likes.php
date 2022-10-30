<?php 

    // Добавление лайка на пост (поиск по id поста и id пользователя)
    session_start();
    // Заносим цвет лайка в SESSION 

    require_once 'mysql.php';
    $result = $mysql -> query("SELECT COUNT(*) FROM `article_likes` WHERE `article_item_id` = {$_GET['idArticle']} AND `user_id` = {$_SESSION['user']['id']}");
    $upLikes = mysqli_fetch_array($result);

    if ($upLikes['COUNT(*)'] == 0) {
        $mysql -> query("INSERT INTO `article_likes` (`id`, `article_item_id`, `user_id`) VALUES (NULL, '{$_GET['idArticle']}', '{$_SESSION['user']['id']}')");
    } else {
        $mysql -> query("DELETE FROM `article_likes` WHERE `article_item_id` = {$_GET['idArticle']} AND `user_id` = {$_SESSION['user']['id']}");
    }

    $resultLikes = $mysql -> query("SELECT COUNT(1) FROM `article_likes` WHERE `article_item_id` = {$_GET['idArticle']}");
    $colLikes = mysqli_fetch_array($resultLikes);
    echo $colLikes['COUNT(1)'];
?>