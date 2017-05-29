<?php
include_once('../../database/auctions.php');

if (!isset($_GET["type"]) || !isset($_GET["offset"]) ){
    $_SESSION['error_messages'][] = 'Error receiving search options.';
    header('Location: ../../index.php');
    die();
}

$type = trim(strip_tags($_GET["type"]));
$offset = trim(strip_tags($_GET["offset"]));

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