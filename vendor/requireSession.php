<?php
    
    if (!$_SESSION['user']['login']) {
        header("Location: auth.php");
    }

?>