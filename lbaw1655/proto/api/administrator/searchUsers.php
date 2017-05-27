<?php
include_once('../../database/users.php');

if(isset($_GET["iduser"]))
{
    echo json_encode(getUser($_GET["iduser"]));
    return;
}

$state = $_GET["state"];
$offset = $_GET["offset"];

echo json_encode(getAdminUsers($state,$offset));


