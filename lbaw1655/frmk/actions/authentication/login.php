<?php
include_once('../../config/init.php');
include_once('../../database/users.php');
include_once('../../templates/common/header.tpl');

if (!$_POST['user'] || !$_POST['pass']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$user = $_POST['user'];
$pass = $_POST['pass'];
$res = isLoginCorrect($user,$pass);


if($res == true) {
    foreach ($res as $key => $value) {
        $_SESSION[$key] = $value;
    }
    $_SESSION['success_messages'][] = 'Login successful';
}
else {
    $_SESSION['error_messages'][] = 'Login failed';
    echo "FAIL";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
