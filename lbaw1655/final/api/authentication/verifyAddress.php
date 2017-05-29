<?php
include_once('../../database/users.php');

if (isset ( $_GET ["address"] )){
    $address = trim(strip_tags($_GET["address"]));
    $hasAddress = hasAddress($address);
    echo json_encode(array("hasUser" => $hasAddress));
    die();
}

$_SESSION['error_messages'][] = 'Error getting address.';
?>