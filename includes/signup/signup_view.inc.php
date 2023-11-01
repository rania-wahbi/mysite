<?php

function signup_inputs()
{
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"]) && !isset($_SESSION["errors_signup"]["name_match"])) {
        echo '<input type="text" name="username" placeholder="username" class="form-control" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '  <input type="text" name="username" placeholder="username" class="form-control">';
    }

    echo '<input type="password" name="pwd" placeholder="password" class="form-control">';

    echo '<input type="password" name="repwd" placeholder="confirm password" class="form-control">';

    if (isset($_SESSION["signup_data"]["mobile"]) && !isset($_SESSION["errors_signup"]["mobile_valid"]) && !isset($_SESSION["errors_signup"]["mobile_length"])) {
        echo '<input type="text" name="mobile" placeholder="phone number" class="form-control" value="' . $_SESSION["signup_data"]["mobile"] . '">';
    } else {
        echo '<input type="text" name="mobile" placeholder="phone number" class="form-control">';
    }

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="email" class="form-control" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="email" class="form-control">';
    }

    echo '<input type="text" name="idCode" placeholder="ID Code" class="form-control">';


    echo '<input type="file" class="form-control" name="avatar" accept="image/jpeg, image/jpg, image/png">';
}

function check_signup_errors()
{


    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<P class='faild'>$error</p>";
        }

        unset($_SESSION["errors_signup"]);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo "<p class='success'>sign up success</p>";
    }
}

