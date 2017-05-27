<?php
include_once('../../config/init.php');
include_once('../../database/users.php');

$id = $_POST["idauction"];

banUser($id);

echo json_encode(array("id" => $id));