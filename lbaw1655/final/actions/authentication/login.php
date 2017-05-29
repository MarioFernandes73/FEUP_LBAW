<?php
include_once('../../config/init.php');
include_once('../../database/users.php');
include_once('../../templates/common/header.tpl');

if (!isset($_POST['user']) || !isset($_POST['pass'])) {
    $_SESSION['error_messages'][] = 'Invalid login, please insert both username and password.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

$user= trim(strip_tags($_POST['user']));
$pass = trim(strip_tags($_POST['pass']));

try {
    if(($res = isLoginCorrect($user, $pass)) == false){
        $_SESSION['error_messages'][] = 'Invalid login or password.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Login error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

$state = $res["state"];

if ($res == true)
{
    if($state == "Inactive") {
        $_SESSION['error_messages'][] = "Invalid login, current account has been deleted.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    elseif($state == "Banned"){
        $_SESSION['error_messages'][] = "Invalid login, current account has been banned.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    foreach ($res as $key => $value) {
        if ($key != "password") {
            $_SESSION[$key] = $value;
        }
    }
    $_SESSION['success_messages'][] = 'Login successful.';
} else {
    $_SESSION['error_messages'][] = 'Login failed.';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
