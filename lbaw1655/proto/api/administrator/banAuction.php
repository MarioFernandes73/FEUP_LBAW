<?php
include_once('../../config/init.php');
$id = $_POST["idauction"];
global $conn;
$stmt = $conn->prepare("UPDATE \"Auction\" SET state = 'Banned'::auctionstate WHERE idauction=? ");
$stmt->execute(array($id));
echo json_encode(array("id" => $id));