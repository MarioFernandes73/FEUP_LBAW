<?php
include_once('../../database/auctions.php');

if (!isset($_GET["type"]) || !isset($_GET["offset"])) {
    $_SESSION['error_messages'][] = 'Error receiving search options.';
    header('Location: ../../index.php');
    die();
}

$type = trim(strip_tags($_GET["type"]));
$offset = trim(strip_tags($_GET["offset"]));

if ($type == "followed") {
    try {
        $auctionsArray = getFollowedAuctions($_SESSION["iduser"], $offset);
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
} elseif ($type == "inConclusion") {
    try {
        $auctionsArray = getInConclusionAuctions($_SESSION["iduser"], $offset);
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
} elseif ($type == "history") {
    try {
        $auctionsArray = getHistoryAuctions($_SESSION["iduser"], $offset);
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
}
echo json_encode($auctionsArray);