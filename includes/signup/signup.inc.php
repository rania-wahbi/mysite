<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST['pwd'];
    $repwd = $_POST['repwd'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $idCode = $_POST['idCode'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_size = $_FILES['avatar']['size'];
    $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
    $name = "/^[a-zA-Z ]+$/";
    $number = "/^[0-9]+$/";

    try {
        require_once '../dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR_HANDLERS
        $errors = [];

        // if (is_input_empty($username, $pwd, $repwd, $email, $idCode)) {
        //     $errors["empty_input"] = "Fill in all fields!";
        // }
        // if (is_name_match($name, $username)) {
        //     $errors["name_match"] = "this username is not valid..!";
        // }
        // if (password_length($pwd)) {
        //     $errors["password_length"] = "Password is weak";
        // }

        // if (is_psw_repwd_match($pwd, $repwd)) {
        //     $errors["psw_repwd_match"] = "password is not same";
        // }
        // if (is_mobile_valid($number, $mobile)) {
        //     $errors["mobile_valid"] = "Mobile number is not valid";
        // }

        // if (mobile_digit($mobile)) {
        //     $errors["mobile_length"] = "Mobile number must be 11 digit";
        // }

        // if (is_email_invalid($email)) {
        //     $errors["invalid_email"] = "Invalid email used!!";
        // }
        // if (is_username_taken($pdo, $username)) {
        //     $errors["username_taken"] = "Username already taken!";
        // }
        // if (is_email_registered($pdo, $email)) {
        //     $errors["email_used"] = "Email already registered!";
        // }
        // if (check_avatar_size($avatar_size)) {
        //     $errors["avatar_size"] = "Image size exceeds 2MB";
        // }

        // if (check_avatar_type()){
        //     $errors["avatar_type"] = "Upload valid images. Only PNG, JPG and JPEG are allowed.";

        // }



        require_once '../config_session.inc.php';


        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email,
                "mobile" => $mobile
            ];

            $_SESSION["signup_data"] = $signupData;
            header("location:../../signupForm.php");
            die();
        }



        create_user($pdo, $username, $pwd, $mobile, $email, $idCode, $avatar);
        save_avatar($avatar_tmp_name, $avatar);


        header("location:../../loginForm.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die(" query failed: " . $e->getMessage());
    }
} else {
    header("location:../../signupForm.php");
}
