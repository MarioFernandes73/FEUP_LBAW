<?php
include_once('../../config/init.php');
include_once('../../database/users.php');
include_once('../../templates/common/header.tpl');

if (!$_POST['user'] || !$_POST['pass']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$res = isLoginCorrect($_POST['user'],$_POST['pass']);

if($res == true) {
    foreach ($res as $key => $value) {
        $_SESSION[$key] = $value;
    }
    $_SESSION['success_messages'][] = 'Login successful';
}
else {
    $_SESSION['error_messages'][] = 'Login failed';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
