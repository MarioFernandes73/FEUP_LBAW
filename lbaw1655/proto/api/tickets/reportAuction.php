<?php
include_once('../../database/auctions.php');

$res = reportAuction($_SESSION['iduser'],$_POST['idauction']);

echo json_encode(array("result" => $res));