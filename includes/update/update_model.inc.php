<?php

function update_set_user($pdo, $update_username, $update_pwd, $update_mobile, $update_email, $update_idCode, $update_avatar)
{

  $query = "UPDATE users SET username=:update_username ,
    pwd=:update_pwd, mobile =:update_mobile , email=:update_email, idCode = :update_idCode, avatar=:update_avatar WHERE id = '" . $_SESSION['user_id'] . "';";

  $stmt = $pdo->prepare($query);

  $options = [
    'cost' => 12
  ];

  $hashedPwd = password_hash($update_pwd, PASSWORD_BCRYPT, $options);

  $stmt->bindparam(":username", $update_username);
  $stmt->bindparam(":pwd", $hashedPwd);
  $stmt->bindparam(":mobile", $update_mobile);
  $stmt->bindparam(":email", $update_email);
  $stmt->bindparam(":idCode", $update_idCode);
  $stmt->bindparam(":avatar", $update_avatar);

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function update_get_user($pdo, $update_username)
{

  $query = "SELECT * FROM users WHERE id = '" . $_SESSION['user_id'] . "';";
  $stmt = $pdo->prepare($query);

  $stmt->bindparam(":username", $update_username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function update_get_email($pdo, $update_email)
{
  $query = "SELECT email FROM users WHERE email= :email;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":email", $update_email);
  $stmt->execute();


  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function select_avatar($pdo, $update_avatar)
{

  $query = "SELECT avatar FROM users WHERE avatar= '" . $_SESSION['user_avatar'] . "';";
  $stmt = $pdo->prepare($query);

  $stmt->bindparam(":avatar", $update_avatar);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}
