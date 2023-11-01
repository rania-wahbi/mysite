<?php
require_once 'config_session.inc.php';
unset($_SESSION["user_id"]);
session_destroy();
header("location:../welcome.php");
