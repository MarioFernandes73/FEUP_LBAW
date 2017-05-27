<?php
include_once('../../database/tickets.php');

$state = $_GET["state"];
$category = $_GET["category"];
$offset = $_GET["offset"];

$tickets = getAdminTickets($state,$category,$offset);

echo json_encode($tickets);