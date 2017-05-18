<?php
include_once('../../config/init.php');

if(isset($_GET["iduser"])){
    include_once('../../database/users.php');
    $user = getUser($_GET["iduser"]);
    $iduser = $user["iduser"];
    $username = $user["username"];
    $name = $user["name"];
    $date1 = new DateTime($user["birthdate"]);
    $address = $user["address"];
    $phonenumber = $user["phonenumber"];
} else {
    $iduser = $_SESSION["iduser"];
    $username = $_SESSION["username"];
    $name = $_SESSION["name"];
    $date1 = new DateTime($_SESSION["birthdate"]);
    $address = $_SESSION["address"];
    $phonenumber = $_SESSION["phonenumber"];
}


$date2 = new DateTime();

$smarty->assign('iduser', $iduser);
$smarty->assign('username', $username);
$smarty->assign('name', $name);
$smarty->assign('age',$date2->diff($date1)->y);
$smarty->assign('address', $address);
$smarty->assign('phone', $phonenumber);
$smarty->display('users/profile.tpl');