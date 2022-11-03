<?php 

    // Создание нового сообщества
    require_once "mysql.php";
    session_start();

    $name_com = filter_var(trim($_POST['name_com']));
    $avatar = $_FILES['avatar']['name'];

    if ($avatar) {
        $avatar = 'image/' . time() . $avatar;
    }
    move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $avatar);

    if ($name_com && $avatar) {
        $inputInfo = "`photo`, `name`";
        $inputData = "'{$avatar}', '{$name_com}'";
    } else {
        $inputInfo = "`name`";
        $inputData = "'{$name_com}'";
    }

    $mysql -> query("INSERT INTO `community` (`admin`, $inputInfo) VALUES ('{$_SESSION['user']['id']}', $inputData)");
    $result = $mysql -> query("SELECT * FROM `community` WHERE id = (SELECT max(id) FROM `community` WHERE admin = {$_SESSION['user']['id']})");
    $community = mysqli_fetch_array($result);
    $mysql -> query("INSERT INTO `com_sub` (`com_id`, `user_id`) VALUES ('{$community['id']}', '{$_SESSION['user']['id']}')");

    header("Location: ../community.php");

?>