<?php
include_once('../../database/auctions.php');

if (!isset($_POST["bidvalue"]) || !isset($_POST["idauction"]) ){
    $_SESSION['error_messages'][] = 'Error receiving bid.';
    header('Location: ../../index.php');
    die();
}

$idauction = trim(strip_tags($_POST['idauction']));
$value = trim(strip_tags($_POST['bidvalue']))*100;

if(isset($_SESSION['iduser']))
    $res = buyAuction($idauction,$_SESSION['iduser'],$value);
else
    $res = "User must be authenticated to proceed.";

echo json_encode(array("result" => $res));