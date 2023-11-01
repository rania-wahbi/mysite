<?php
require_once 'includes/config_session.inc.php';

if( isset($_SESSION["user_id"])){
    header("location:welcome.php");
}
require_once 'includes/signup/signup_view.inc.php';
include 'header.php'


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>sign up</title>
</head>
<body>

<div class="container p-5 my-5 border ">

    <h2>Register Here</h2>

    <form action="includes/signup/signup.inc.php" method="POST" enctype="multipart/form-data">
        <?php signup_inputs(); ?>
        <div>
            <button class="btn btn-primary" type="submit" name="signup_button">signup</button>
        </div>
    </form>

    <div>
        <p style="display: inline">Already have an account?</p>
        <a href="loginForm.php">Login Now</a>
    </div>

    <?php
    check_signup_errors();
    ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>
</html>






