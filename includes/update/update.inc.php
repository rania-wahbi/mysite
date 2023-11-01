<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $update_username = $_POST["update_username"];
    $update_pwd = $_POST['update_pwd'];
    $update_repwd = $_POST['update_repwd'];
    $update_mobile = $_POST['update_mobile'];
    $update_email = $_POST['update_email'];
    $update_idCode = $_POST['update_idCode'];
    $update_avatar = $_FILES['update_avatar']['name'];
    $update_avatar_size = $_FILES['update_avatar']['size'];
    $update_avatar_tmp_name = $_FILES['update_avatar']['tmp_name'];
    $name = "/^[a-zA-Z ]+$/";
    $number = "/^[0-9]+$/";

    try {
        require_once '../dbh.inc.php';
        require_once '../config_session.inc.php';
        require_once 'update_model.inc.php';
        require_once 'update_contr.inc.php';

        //ERROR_HANDLERS
        $errors = [];


        // if (is_name_match($name, $update_username)) {
        //     $errors["name_match"] = "this username is not valid..!";
        // }
        // if (password_length($update_pwd)) {
        //     $errors["password_length"] = "Password is weak";
        // }

        // if (is_psw_repwd_match($update_pwd, $update_repwd)) {
        //     $errors["psw_repwd_match"] = "password is not same";
        // }
        // if (is_mobile_valid($number, $update_mobile)) {
        //     $errors["mobile_valid"] = "Mobile number is not valid";
        // }

        // if (mobile_digit($update_mobile)) {
        //     $errors["mobile_length"] = "Mobile number must be 11 digit";
        // }

        // if (is_email_invalid($update_email)) {
        //     $errors["invalid_email"] = "Invalid email used!!";
        // }
        // if (is_username_taken($pdo, $update_username)) {
        //     $errors["username_taken"] = "Username already taken!";
        // }
        // if (is_email_registered($pdo, $update_email)) {
        //     $errors["email_used"] = "Email already registered!";
        // }
        // if (check_avatar_size($update_avatar_size)) {
        //     $errors["avatar_size"] = "Image size exceeds 2MB";
        // }

        // if (check_avatar_type()) {
        //     $errors["avatar_type"] = "Upload valid images. Only PNG, JPG and JPEG are allowed.";
        // }

        // if ($errors) {
        //     $_SESSION['update_error'] = $errors;
        //     header("location:../../updateForm.php");
        // }

        update_user($pdo, $update_username, $update_pwd, $update_mobile, $update_email, $update_idCode, $update_avatar);
        update_avatar($avatar_tmp_name, $update_avatar);


        $result =  update_get_user($pdo, $update_username);


        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);


        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["user_pwd"] = htmlspecialchars($result["pwd"]);
        $_SESSION["user_mobile"] = htmlspecialchars($result["mobile"]);
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        $_SESSION["user_idCode"] = htmlspecialchars($result["idCode"]);
        $_SESSION["user_avatar"] = htmlspecialchars($result["avatar"]);
        $_SESSION["last_regeneration"] = time();

        header("location:../../welcome.php?update=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die(" query failed: " . $e->getMessage());
    }
} else {
    header("location:../../welcome.php");
    die();
}
