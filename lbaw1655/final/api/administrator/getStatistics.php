<?php
include_once('../../database/auctions.php');
include_once('../../database/users.php');

try {
    $quantityAuctions = getQtAuctions();
    $quantityUsers = getQtUsers();
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}

echo json_encode(array("quantityAuctions" => $quantityAuctions['count'], "quantityUsers" => $quantityUsers['count']));