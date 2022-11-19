<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/friendMessages.css">
    <title>Сообщения</title>
</head>
<body>
    <?php
        require_once 'vendor/header.php';
        session_start();
        require_once 'vendor/mysql.php';
    ?>

    <div class="block_viewMessage">
        <div class="messages">
            <?php
                $resultMessages = $mysql -> query("SELECT * FROM `message` WHERE (`user` = '{$_SESSION['user']['id']}' OR `user` = '{$_GET['id']}') AND (`friend` = '{$_GET['id']}' OR `friend` = '{$_SESSION['user']['id']}') ORDER BY id ASC");
                while($messages = mysqli_fetch_array($resultMessages)) {
                    if ($messages['user'] == $_SESSION['user']['id']) {
                        echo "
                            <div class='user_view_messages'>
                                <p>{$messages['text']}</p>
                            </div>
                        ";
                    } else {
                        echo "
                            <div class='friend_view_messages'>
                                <p>{$messages['text']}</p>
                            </div>
                        ";
                    }
                }
            ?>
        </div>
        <div class="submit_message">
            <form action="vendor/new_message.php" method="$_POST">
                <textarea class="submit" name="message" placeholder="Новое сообщение..."></textarea>
                <?php
                    echo "<input type='hidden' name='friend' value='{$_GET['id']}'>";
                ?>
                <input class="buttonSubmit" type="submit" value="Отправить">
            </form>
        </div>
    </div>

</body>
</html>