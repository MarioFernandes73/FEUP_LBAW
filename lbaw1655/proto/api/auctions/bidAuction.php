<?php
include_once('../../database/auctions.php');

$value = $_POST['bidvalue']*100;

if(isset($_SESSION['iduser']))
    $res = bidAuction($_POST['idauction'],$_SESSION['iduser'],$value);
else
    $res = "User must be authenticated to proceed.";

echo json_encode(array("result" => $res));