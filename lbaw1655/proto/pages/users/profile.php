<?php
include_once('../../config/init.php');

if(!isset($_SESSION['iduser'])) {
    $_SESSION['error_messages'][] = 'The user must be authenticated to proceed.';
    header('Location: ../../index.php');
    die();
}
$sessionUser = $_SESSION['iduser'];

if (isset($_GET["iduser"])) {
    $iduser = trim(strip_tags($_GET["iduser"]));
}
else{
    $_SESSION['error_messages'][] = 'Error getting user <--.';
    header('Location: ../../index.php');
    die();
}

include_once('../../database/users.php');

$user = getUser($iduser);
$owner = true;
if(($sessionUser != $iduser))
{
    $user2 = getUser($sessionUser);
    if($user2['state'] != "Administrator"){
        $_SESSION['error_messages'][] = 'User without permissions to proceed.';
        header('Location: ../../index.php');
        die();
    }else{
        $owner = false;
    }
}

$username = $user["username"];
$name = $user["name"];
$date1 = new DateTime($user["birthdate"]);
$date2 = new DateTime();
$address = $user["address"];
$phonenumber = $user["phonenumber"];

$smarty->assign('iduser', $iduser);
$smarty->assign('username', $username);
$smarty->assign('name', $name);
$smarty->assign('age', $date2->diff($date1)->y);
$smarty->assign('address', $address);
$smarty->assign('phone', $phonenumber);
$smarty->assign('owner', $owner);

$smarty->display('users/profile.tpl');