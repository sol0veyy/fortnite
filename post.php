<?php
    require('vendor/mysql.php');
    $result = $mysql -> query("SELECT * FROM `news` WHERE `id` = '{$_GET['id']}'");
    $news = mysqli_fetch_array($result)
?>

<?php      
        require_once('vendor/requireSession.php')
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/post.css">
    <title>Новости</title>
</head>
<body>
    <?php require_once 'vendor/header.php'; ?>
    <?php

        echo "
        <div class='post'>
            <h1>{$news['header']}</h1>
            <img src='{$news['picture']}'>
            <p>{$news['text']}</p>
            <p>{$news['time_text']}</p>
        </div>
        ";

    ?>
</body>
</html>