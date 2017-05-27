<?php
include_once('../../config/init.php');

if (isset($_GET["iduser"])) {
    include_once('../../database/users.php');
    $user = getUser($_GET["iduser"]);
    $iduser = $user["iduser"];
    $username = $user["username"];
    $name = $user["name"];
    $date1 = new DateTime($user["birthdate"]);
    $address = $user["address"];
    $phonenumber = $user["phonenumber"];
    if ($_GET["iduser"] == $_SESSION["iduser"])
        $owner = true;
    else
        $owner = false;

    if ($_SESSION["state"] == "Administrator")
        $view = true;
    else
        $view = false;
    //  var_dump($_SESSION);
} else {
    $iduser = $_SESSION["iduser"];
    $username = $_SESSION["username"];
    $name = $_SESSION["name"];
    $date1 = new DateTime($_SESSION["birthdate"]);
    $address = $_SESSION["address"];
    $phonenumber = $_SESSION["phonenumber"];
    $owner = true;
    $view = true;
}


$date2 = new DateTime();

$smarty->assign('iduser', $iduser);
$smarty->assign('username', $username);
$smarty->assign('name', $name);
$smarty->assign('age', $date2->diff($date1)->y);
$smarty->assign('address', $address);
$smarty->assign('phone', $phonenumber);
$smarty->assign('owner', $owner);
$smarty->assign('view', $view);
$smarty->display('users/profile.tpl');