<?php
include_once('../../database/tickets.php');

$solved = $_GET["solved"];
$offset = $_GET["offset"];

if(is_null($solved)) {
    $ticketArray = getAllTickets($_SESSION["iduser"],$offset);
}
else{
    $ticketArray = getUserTickets($_SESSION["iduser"], $solved,$offset);
}

echo json_encode($ticketArray);