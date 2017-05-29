<?php
include_once('../../database/auctions.php');

if(!isset($_POST['idauction'])){
    $_SESSION['error_messages'][] = 'Error receiving auction.';
    header('Location: ../../index.php');
    die();
}
$idauction = trim(strip_tags($_POST['idauction']));

if(isset($_SESSION['iduser'])){
    $res = reportAuction($_SESSION['iduser'],$idauction);
} else{
    $res = "User without permissions to report the auction.";
}

echo json_encode(array("result" => $res));