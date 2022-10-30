<?php
    session_start();
    require('vendor/mysql.php');
    $result = $mysql -> query("SELECT * FROM `community` WHERE `id` = '{$_GET['id']}'");
    $resultArticle = $mysql -> query("SELECT * FROM `article` WHERE `community_id` = '{$_GET['id']}'");
    $group = mysqli_fetch_array($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/group.css">
    <title><?php echo $group['name']; ?></title>
</head>
<body>
    <?php require_once 'vendor/header.php'; ?>


    <!-- Информация о сообществе -->
    <?php
        echo "
            <div class='infoGroup'>
                <img src='{$group['photo']}'>
                <h2>{$group['name']}</h2>
                <p>{$group['sub']} подписчиков</p>
            </div>
        ";
    ?>

    <!-- Посты сообщества -->
    <?php
        if ($_SESSION['user']['login']) {
            $colArticle = 0;
            while ($article = mysqli_fetch_array($resultArticle)) {
                $resultLikes = $mysql -> query("SELECT COUNT(1) FROM `article_likes` WHERE `article_item_id` = {$article['id']}");
                $colLikes = mysqli_fetch_array($resultLikes);
                $resultColorLike = $mysql -> query("SELECT * FROM `article_likes` WHERE `article_item_id` = {$article['id']} AND `user_id` = {$_SESSION['user']['id']}");
                $colorLikes = mysqli_fetch_array($resultColorLike);
                echo "
                <div class='article'>
                    <div class='name_com'>
                        <h2>{$article['name_com']}</h2>
                    </div>
                    <p>{$article['text_article']}</p>
                    <div class='likes'>
                        <svg id='like{$colArticle}' class='like-off {$colorLikes['color']}' onclick=upLikes({$colArticle}) width='30' height='30' viewBox='0 0 25 21' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M17.5 0C15.673 0.08635 13.9419 0.84287 12.6375 2.125L12.4875 2.2625L12.3375 2.125C10.954 0.77131 9.098 0.00918 7.1625 0C5.26505 0 3.44513 0.7529 2.10226 2.09343C0.75939 3.43395 0.00331 5.2526 0 7.15C0 11 1.4125 12.8375 7.725 17.825L11.0875 20.45C11.9125 21.1 13.0875 21.1 13.9125 20.45L16.8625 18.15L18.0375 17.225C23.7 12.675 25 10.85 25 7.15C24.9967 5.2526 24.2406 3.43395 22.8977 2.09343C21.5549 0.7529 19.735 0 17.8375 0H17.5Z'/>
                        </svg>
                        <span id='colLikes{$colArticle}' data-idarticle='{$article['id']}'>{$colLikes['COUNT(1)']}</span>
                    </div>
                </div>
                ";
                $colArticle++;
            }
            $_SESSION['colArticle'] = $colArticle;
            echo "<div id='info' data-colarticle='{$_SESSION['colArticle']}'></div>";
        } else {
            header("Location: auth.php");
        }
    ?>

    <script src="components/likes.js"></script>
</body>
</html>