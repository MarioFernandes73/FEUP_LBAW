<?php
include_once('../../config/init.php');
include_once('../../database/users.php');
include_once('../../templates/common/header.tpl');

<<<<<<< HEAD
$user= trim(strip_tags($_POST['user']));
$pass = trim(strip_tags($_POST['pass']));

if (!$user || !$pass) {
    $_SESSION['error_messages'][] = 'Invalid login, please insert both username and password.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
try {
    if(($res = isLoginCorrect($user, $pass)) == false){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
} catch (PDOException $e) {
    exit;
}

$state = $res["state"];

if ($res == true) {
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
=======
if (!$_POST['user'] || !$_POST['pass']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$res = isLoginCorrect($_POST['user'],$_POST['pass']);

if($res == true) {
    foreach ($res as $key => $value) {
        if($key!="password"){
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
            $_SESSION[$key] = $value;
        }
    }
    $_SESSION['success_messages'][] = 'Login successful';
<<<<<<< HEAD
} else {
=======
}
else {
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    $_SESSION['error_messages'][] = 'Login failed';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
