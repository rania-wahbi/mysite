<?php

function get_username($pdo, $username)
{
    $query = "SELECT username FROM users WHERE username= :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();


    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_email($pdo, $email)
{
    $query = "SELECT email FROM users WHERE email= :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();


    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user($pdo, $username, $pwd, $mobile, $email, $idCode, $avatar)
{

    $query = "INSERT INTO users ( username, pwd, email,mobile, idCode,avatar ) VALUES ( :username, :pwd, :email, :mobile, :idCode ,:avatar );";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt->bindparam(":username", $username);
    $stmt->bindparam(":pwd", $hashedPwd);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":mobile", $mobile);
    $stmt->bindparam(":idCode", $idCode);
    $stmt->bindparam(":avatar", $avatar);

    $result = $stmt->execute();


    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



//move_uploaded_file()
//    is_dir()
//    file_exists()
//    mkdir()
