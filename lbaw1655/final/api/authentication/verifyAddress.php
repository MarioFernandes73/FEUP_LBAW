<?php
include_once('../../database/users.php');

if (isset ($_GET ["address"])) {
    $address = trim(strip_tags($_GET["address"]));
    try {
        $hasAddress = hasAddress($address);
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
    echo json_encode(array("hasUser" => $hasAddress));
    die();
}

$_SESSION['error_messages'][] = 'Error getting address.';
?>