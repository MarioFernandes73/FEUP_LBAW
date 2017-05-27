<?php
include_once('../../database/tickets.php');
echo json_encode(getTicket($_GET['idticket']));