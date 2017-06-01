<?php
include_once('../../database/tickets.php');

if (!isset($_GET["idticket"])) {
    $_SESSION['error_messages'][] = 'Error receiving ticket.';
    header('Location: ../../index.php');
    die();
}
$offset = $_GET['offset'];
$idticket = trim(strip_tags($_GET['idticket']));
try {
    echo json_encode(getTicket($idticket, $offset));
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}