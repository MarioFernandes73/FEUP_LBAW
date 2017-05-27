<?php
include_once('../../database/auctions.php');

$type = $_GET["type"];
$offset = $_GET["offset"];

if($type == "followed"){
    $auctionsArray = getFollowedAuctions($_SESSION["iduser"],$offset);
}
elseif($type == "inConclusion"){
    $auctionsArray = getInConclusionAuctions($_SESSION["iduser"],$offset);
}
elseif($type == "history"){
    $auctionsArray = getHistoryAuctions($_SESSION["iduser"],$offset);
}
echo json_encode($auctionsArray);