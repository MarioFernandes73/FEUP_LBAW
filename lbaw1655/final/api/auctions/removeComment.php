<?php
include_once('../../database/auctions.php');

$idcomment = trim(strip_tags($_POST['idcomment']));

if(isset($_SESSION['iduser']))
    $res = removeComment($_SESSION['iduser'],$idcomment);
else
    $res = "User must be authenticated to proceed.";

echo json_encode(array("result" => $res));