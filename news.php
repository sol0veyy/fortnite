<?php
    require('vendor/mysql.php');
    $result = $mysql -> query("SELECT * FROM `article`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <title>Новости</title>
</head>
<body>
    <?php require('vendor/header.php') ?>
    <?php
        while ($article = mysqli_fetch_array($result)) {
            $resultLikes = $mysql -> query("SELECT COUNT(1) FROM `article_likes` WHERE `article_item_id` = {$article['id']}");
            $colLikes = mysqli_fetch_array($resultLikes);
            echo "
            <div class='article'>
                <div class='name_com'>
                    <h2>{$article['name_com']}</h2>
                </div>
                <p>{$article['text_article']}</p>
                <div class='likes'>
                    <a class='upLikes' href='vendor/likes.php?idArticle={$article['id']}'><img class='heart' src='components/img/heart.svg'></a>
                    <span class='likesNum''>{$colLikes['COUNT(1)']}</span>
                </div>
            </div>
            ";
        }   
    ?>

    <a href="#" class="link"></a>
    
    <script src="components/likes.js"></script>
</body>
</html>