<?php
function update_inputs()
{

    if (isset($_SESSION["user_id"])) {

        echo '<input type="text" name="update_username" placeholder="username" class="form-control" value="' . $_SESSION["user_username"] . '">';

        echo '<input type="password" name="update_pwd" placeholder="password" class="form-control">';

         echo '<input type="password" name="update_repwd" placeholder="password" class="form-control">';

        echo '<input type="text" name="update_mobile" placeholder="phone number" class="form-control" value="' . $_SESSION["user_mobile"] . '">';

        echo '<input type="text" name="update_email" placeholder="email" class="form-control" value="' . $_SESSION["user_email"] . '">';

        echo '<input type="text" name="update_idCode" placeholder="ID Code" class="form-control" value="' . $_SESSION["user_idCode"] . '">';

        echo '<img src="includes/uploaded_img/' . $_SESSION['user_avatar'] . '">';
    } else {
        echo 'error';
    }
}

function check_update_errors()
{


    if (isset($_SESSION['update_error'])) {
        $errors = $_SESSION['update_error'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<P class='faild'>$error</p>";
        }

        unset($_SESSION["'update_error'"]);

    } elseif (isset($_GET["update"]) && $_GET["update"] === "success") {
        echo '<br>';
        echo "<p class='success'>update success</p>";
    }
}
