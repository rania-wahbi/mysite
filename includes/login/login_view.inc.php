<?php

function check_login_errors(){

    if(isset($_SESSION["errors_login"])){
    $errors= $_SESSION["errors_login"];
    echo "<br>";
    foreach($errors as $error){
        echo '<p class="faild"> ' . $error . '</p> ';
        }
        unset($_SESSION["errors_login"]);
    }

    else if(isset($_GET['login']) && $_GET['login']==="success"){
        echo "<br>";
        echo '<P class="success">login success! </P>';

    }
}
