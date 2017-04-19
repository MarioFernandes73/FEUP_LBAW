<?php
include_once('../../database/users.php');

$hasAddress = hasAddress($_GET['address']);

echo json_encode($hasAddress);
?>