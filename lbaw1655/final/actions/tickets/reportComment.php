<?php
include_once('../../database/auctions.php');

if (!isset($_POST["idauction"]) || !isset($_POST["idcomment"])){
    $_SESSION['error_messages'][] = 'Error getting auction.';
    die();
}
$idauction = trim(strip_tags($_POST['idauction']));
$idcomment = trim(strip_tags($_POST['idcomment']));

if(!isset($_POST["message"])){
    $message = null;
}else{
    $message = trim(strip_tags($_POST['message']));
}

var_dump($_POST);

if (isset($_SESSION['iduser'])) {

    try {
        $msg = reportComment($_SESSION['iduser'], $idcomment, $message);
        if ($msg != "") {
            $_SESSION['error_messages'] = $msg;
            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
            exit();
        }

        $_SESSION['success_messages'] = 'Comment reported successfully.';
        header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);

    } catch
    (PDOException $e) {
        $_SESSION['error_messages'] = 'Could not reported comment, please try again.';
        header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
    }
} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
    exit();
}


