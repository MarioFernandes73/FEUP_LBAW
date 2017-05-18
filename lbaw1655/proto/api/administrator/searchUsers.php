<?php
include_once('../../config/init.php');

global $conn;

if(isset($_GET["iduser"])){
    $stmt = $conn->prepare("SELECT * FROM \"User\" WHERE iduser=?");
    $stmt->execute(array($_GET["iduser"]));
    echo json_encode($stmt->fetch());
    return;
}
$state = $_GET["state"];
if($state == "Active"){
    $stmt = $conn->prepare("SELECT * FROM \"User\" WHERE state=? OR state=? LIMIT 10");
    $stmt->execute(array("Validated", "Registered"));
}
else{
    $stmt = $conn->prepare("SELECT * FROM \"User\" WHERE state=? LIMIT 10");
    $stmt->execute(array($state));
}
$users = $stmt->fetchAll();


echo json_encode($users);


