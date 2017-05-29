<?php
include_once('../../database/auctions.php');

if (!isset($_POST["idauction"]) ){
    $_SESSION['error_messages'][] = 'Error receiving auction.';
    header('Location: ../../index.php');
    die();
}

$idauction = trim(strip_tags($_POST['idauction']));
echo json_encode(getIdUser($idauction));