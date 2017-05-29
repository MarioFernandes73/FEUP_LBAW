<?php
include_once('../../database/auctions.php');

if (!isset($_POST["altervalue"]) || !isset($_POST["idauction"]) ){
    $_SESSION['error_messages'][] = 'Error receiving price.';
    header('Location: ../../index.php');
    die();
}

$idauction = trim(strip_tags($_POST['idauction']));
$value = trim(strip_tags($_POST['altervalue']))*100;

if(isset($_SESSION['iduser']))
    $res = alterAuctionPrice($idauction,$_SESSION['iduser'],$value);
else
    $res = "User must be authenticated to proceed.";

echo json_encode(array("result" => $res));