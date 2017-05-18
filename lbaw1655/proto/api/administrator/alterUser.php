<?php
include_once('../../config/init.php');
$id = $_POST["iduser"];
$state = $_POST["state"];
$action = $_POST["action"];

global $conn;

if($action == "demote"){
    if($state == "Administrator"){
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Validated'::userstate 
WHERE iduser=? AND state =?");
    } elseif ($state == "Validated" || $state == "Registered"){
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Banned'::userstate 
WHERE iduser=? AND state =?");
    }

} elseif($action == "promote"){
    if($state == "Registered" || $state == "Validated"){
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Administrator'::userstate 
WHERE iduser=? AND state =?");
    } elseif ($state == "Banned"){
        $stmt = $conn->prepare("UPDATE \"User\" SET state = 'Validated'::userstate 
WHERE iduser=? AND state =?");
    }
}

$stmt->execute(array($id, $state));
echo json_encode(array("id" => $id));
return;
