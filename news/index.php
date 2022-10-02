<?php
    $mysql = new mysqli('localhost', 'root', 'root', 'fortnite');
    $result = $mysql -> query("SELECT * FROM `news`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css">
    <title>Новости</title>
</head>
<body>
    <?php require('header.php') ?>
    <div class="news">
        <?php
            while ($news = mysqli_fetch_array($result)) {
                echo "<div class='block__news'>";
                    echo "<img src='{$news['picture']}'>";
                    echo "<h1>{$news['header']}</h1>";
                    echo "<p>{$news['time_text']}</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>