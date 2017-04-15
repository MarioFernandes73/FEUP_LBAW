<?php
include_once('../../config/init.php');
function isLoginCorrect($user,$pass){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"User\" where username=? AND password=?");
    $stmt->execute(array($user,$pass));
    return $stmt->fetch();
}