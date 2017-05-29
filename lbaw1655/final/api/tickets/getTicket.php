<?php
include_once('../../database/tickets.php');

if (!isset($_GET["idticket"]) ){
    $_SESSION['error_messages'][] = 'Error receiving ticket.';
    header('Location: ../../index.php');
    die();
}

$idticket = trim(strip_tags($_GET['idticket']));
echo json_encode(getTicket($idticket));