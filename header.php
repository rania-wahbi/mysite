<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup/signup_view.inc.php';
require_once 'welcome/userProfile_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="welcome.php">Home</a>
                </li>
                <?php
                if (isset($_SESSION['user_username'])) {
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.inc.php">log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="updateForm.php">update</a>
                    </li>
                    <div>
                        <li>
                            <a href="#"><?php get_avatar(); ?></a>
                        </li>
                    </div>
                <?php
                } else {
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="signupForm.php">signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loginForm.php">login</a>
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>