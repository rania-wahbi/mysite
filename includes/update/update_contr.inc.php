<?php
// require_once '../signup/signup_contr.inc.php';


include_once 'update_model.inc.php';



function is_name_match($name, $update_username)
{
    if (!preg_match($name, $update_username)) {
        return true;
    } else
        return false;
}

function password_length($update_pwd)
{
    if (strlen($update_pwd) < 9) {
        return true;
    } else
        return false;
}

function is_psw_repwd_match($update_pwd, $update_repwd)
{
    if ($update_pwd != $update_repwd) {
        return true;
    } else
        return false;
}

function is_mobile_valid($number, $update_mobile)
{
    if (!preg_match($number, $update_mobile)) {
        return true;
    } else
        return false;
}

function mobile_digit($update_mobile)
{
    if (!(strlen($update_mobile) === 11)) {
        return true;
    } else
        return false;
}

function is_email_invalid($update_email)
{
    if (!filter_var($update_email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken($pdo, $update_username)
{
    if (update_get_user($pdo, $update_username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered($pdo, $update_email)
{
    if (update_get_email($pdo, $update_email)) {
        return true;
    } else {
        return false;
    }
}

function check_avatar_size($update_avatar_size)
{
    if ($update_avatar_size > 2000000) {
        return true;
    } else {
        return false;
    }
}

function check_avatar_type()
{
    $allowed_image_extension = [
        "png",
        "jpg",
        "jpeg"
    ];

    $file_extension = pathinfo($_FILES["update_avatar"]["name"], PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_image_extension)) {
        return true;
    } else {
        return false;
    }
}

function update_avatar($update_avatar_tmp_name, $update_avatar)
{

    $update_avatar_folder = '../uploaded_img';

    if (!is_dir($update_avatar_folder)) {
        mkdir($update_avatar_folder);
    }

    $str_to_arry        = explode('.', $update_avatar); //the string will be split whenever a dot is encountered
    $extension          = end($str_to_arry); // get extension of the file.
    $new_name             = "updated_upload-image-" . time() . "." . $extension; // new name
    $update_avatar = $new_name;

    move_uploaded_file($update_avatar_tmp_name, $update_avatar_folder . "/" . $update_avatar);
}



function update_user($pdo, $update_username, $update_pwd, $update_mobile, $update_email, $update_idCode, $update_avatar)
{
    update_set_user($pdo, $update_username, $update_pwd, $update_mobile, $update_email, $update_idCode, $update_avatar);
}

function return_avatar($pdo, $avatar)
{

    return select_avatar($pdo, $avatar);
}
