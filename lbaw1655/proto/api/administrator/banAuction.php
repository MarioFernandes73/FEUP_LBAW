<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

if (!isset($_POST["idauction"]) ){
    $_SESSION['error_messages'][] = 'Error receiving auction.';
    header('Location: ../../index.php');
    die();
}

$id = trim(strip_tags($_POST["idauction"]));
banAuction($id);

echo json_encode(array("id" => $id));