<?php
include_once('../../database/users.php');

if(isset($_GET["iduser"]))
{
    $iduser = trim(strip_tags($_GET["iduser"]));
    echo json_encode(getUser($iduser));
    return;
}

if (!isset($_GET["state"]) || !isset($_GET["offset"])){
    $_SESSION['error_messages'][] = 'Error receiving user.';
    header('Location: ../../index.php');
    die();
}

$state = trim(strip_tags($_GET["state"]));
$offset = trim(strip_tags($_GET["offset"]));

echo json_encode(getAdminUsers($state,$offset));


