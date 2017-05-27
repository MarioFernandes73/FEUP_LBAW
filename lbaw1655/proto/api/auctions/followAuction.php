<?php
include_once('../../database/auctions.php');

$res = followAuction($_SESSION['iduser'],$_POST['idauction']);

echo json_encode(array("result" => $res["result"], "msg"=>$res["msg"], "follow"=>$res["follow"]));