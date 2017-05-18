<?php
include_once('../../config/init.php');
$solved = $_GET["solved"];
global $conn;
if(is_null($solved)) {
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" WHERE iduser=? LIMIT 10");
    $stmt->execute(array($_SESSION["iduser"]));
}
else{
    $stmt = $conn->prepare("SELECT * FROM \"Ticket\" WHERE iduser=? AND solved=? LIMIT 10");
    $stmt->execute(array($_SESSION["iduser"], $solved));
}
$ticketArray = $stmt->fetchAll();
echo json_encode($ticketArray);