<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];


    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR_HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }


        $result = get_user($pdo, $username);
        var_dump($result);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "incorrect name or password!";
        }

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "incorrect name or password!";
        }

        require_once '../config_session.inc.php';


        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("location:../../loginForm.php");
            die();
        }

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


        header("location:../../welcome.php?login=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die(" query failed: " . $e->getMessage());
    }
} else {
    header("location:../../loginForm.php");
    die();
}
