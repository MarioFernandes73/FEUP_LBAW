<?php
include_once('../../database/auctions.php');
include_once('../../database/users.php');

if (!isset($_GET['userid']) ){
    $_SESSION['error_messages'][] = 'Error receiving user.';
    header('Location: ../../index.php');
    exit();
}
$userid =  trim(strip_tags($_GET['userid']));
try {

    $quantityBids = getQtBids($userid);
    $quantityWonAuctions = getQtWonAuctions($userid);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}

echo json_encode(array("quantityBids" => $quantityBids['count'], "quantityWonAuctions" => $quantityWonAuctions['count']));