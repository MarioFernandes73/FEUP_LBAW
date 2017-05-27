<?php
include_once('../../database/users.php');

$res =isUserFollowing($_SESSION['iduser'], $_POST['idauction']);

echo json_encode(array("result" => $res));