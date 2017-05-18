<?php
include_once('../../database/auctions.php');

$res = removeComment($_SESSION['iduser'],$_POST['idcomment']);

echo json_encode(array("result" => $res));