<?php
require_once 'includes/config_session.inc.php';
// if( isset($_SESSION["user_id"])){
//     header("location:welcome.php");
// }
require_once 'includes/login/login_view.inc.php';
require_once 'header.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>log in</title>
</head>
<body>
<div class="container p-5 my-5 border ">
    <h2>Login Now</h2>
    <form action="includes/login/login.inc.php" method="post">
        <input type="text" name="username" placeholder="username" class="form-control">
        <input type="password" name="pwd" placeholder="password" class="form-control">
        <div>
        <button  class="btn btn-success" >login</button>
        </div>
    </form>
    <div>
        <p style="display: inline">Do not have an account?</p>
        <a href="signupForm.php" >Signup Now</a>
    </div>

    <?php check_login_errors();?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>




