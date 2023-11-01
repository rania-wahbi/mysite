<?php
require_once 'includes/config_session.inc.php';
require_once 'welcome/userProfile_view.inc.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>welcome</title>
</head>

<body>
    <?php

    if (isset($_SESSION["user_id"])) {
        echo ' <h2>Welcome ' .  $_SESSION['user_username'] . ' !</h2>' . get_avatar();
       
    } else {
        echo '<h2>Welcome Guest!</h2>';
    }
    ?>
</body>

</html>