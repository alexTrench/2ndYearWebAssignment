<?php
ini_set("session.save_path" , "/home/unn_w16010695/sessionData");
session_start();

$_SESSION = array();
session_destroy();


header('Location: ' . $_SERVER['HTTP_REFERER']);


?>