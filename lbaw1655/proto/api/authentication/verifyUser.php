<?php
include_once('../../database/users.php');

$hasUsername = hasUsername($_GET['username']);

echo json_encode(array("hasUsername" => $hasUsername));