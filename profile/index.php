<?php
    require('../mysql.php');
    $sql = 'SELECT photo FROM user';
    $result = mysqli_query($mysql, $sql);
    $photo = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../news/news.css">
    <link rel="stylesheet" href="profile.css">
    <title>Профиль</title>
</head>
<body>
    <?php require('../news/header.php') ?>
    <div class="photo">
        <img src="<?= $photo['photo'] ?>" alt="">
    </div>
    <div class="reg-auth">
        <a href="../reg-auth/">Авторизоваться</a>
    </div>
</body>
</html>