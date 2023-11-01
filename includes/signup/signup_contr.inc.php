<?php

include_once 'signup_model.inc.php';
include_once 'signup.inc.php';

function is_input_empty($username, $pwd, $repwd, $email, $idCode)
{
    if (empty($username) || empty($pwd) || empty($repwd) || empty($email) || empty($idCode)) {
        return true;
    } else {
        return false;
    }
}

function is_name_match($name, $username)
{
    if (!preg_match($name, $username)) {
        return true;
    } else
        return false;
}

function password_length($pwd)
{
    if (strlen($pwd) < 9) {
        return true;
    } else
        return false;
}

function is_psw_repwd_match($pwd, $repwd)
{
    if ($pwd != $repwd) {
        return true;
    } else
        return false;
}

function is_mobile_valid($number, $mobile)
{
    if (!preg_match($number, $mobile)) {
        return true;
    } else
        return false;
}

function mobile_digit($mobile)
{
    if (!(strlen($mobile) === 11)) {
        return true;
    } else
        return false;
}

function is_email_invalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken($pdo, $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered($pdo, $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function check_avatar_size($avatar_size)
{
    if ($avatar_size > 2000000) {
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

    $file_extension = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_image_extension)) {
        return true;
    } else {
        return false;
    }
}

function save_avatar($avatar_tmp_name, $avatar)
{

    $avatar_folder = '../../uploaded_img';

    if (!is_dir($avatar_folder)) {
        mkdir($avatar_folder);
    }

    $str_to_arry        = explode('.', $avatar); //the string will be split whenever a dot is encountered
    $extension          = strtolower(end($str_to_arry)); // get extension of the file.
    $new_name             = "upload-image-" . time() . "." . $extension; // new name
    $avatar = $new_name;

    move_uploaded_file($avatar_tmp_name, $avatar_folder . "/" . $avatar);
}



function create_user($pdo, $username, $pwd, $mobile, $email, $idCode, $avatar)
{
    return set_user($pdo, $username, $pwd, $mobile, $email, $idCode, $avatar);
}
