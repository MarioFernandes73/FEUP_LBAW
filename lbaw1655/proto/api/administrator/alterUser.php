<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

$id = $_POST["iduser"];
$state = $_POST["state"];
$action = $_POST["action"];

global $conn;

if($action == "demote"){
    demoteUser($id,$state);
} elseif($action == "promote"){
    promoteUser($id,$state);
}

echo json_encode(array("id" => $id));