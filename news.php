<?php
    require('vendor/mysql.php');
    $result = $mysql -> query("SELECT * FROM `news`");
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
    <div class="news">
        <?php
            while ($news = mysqli_fetch_array($result)) {
                $linkId = "post.php?id=" . "{$news['id']}";
                echo "<div class='block__news'>";
                    echo "<a href='$linkId'>";
                    echo "<img src='{$news['picture']}'>";
                    echo "<h1>{$news['header']}</h1>";
                    echo "<p>{$news['time_text']}</p>";
                    echo "</a>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>