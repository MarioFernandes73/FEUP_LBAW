<?php
include_once('../../database/auctions.php');

$idauction = $_POST['idauction'];
$message = $_POST['message'];
$idcomment = $_POST['idcomment'];
var_dump($_POST);

if (isset($_SESSION['iduser'])) {

    try {

        $msg = reportComment($_SESSION['iduser'], $idcomment, $message);
        if ($msg != "") {
            $_SESSION['error_messages'] = $msg;
            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
            exit();
        }

        $_SESSION['success_messages'] = 'Reported comment successfully';
        header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);

    } catch
    (PDOException $e) {
        $_SESSION['error_messages'] = 'Could not reported comment, please try again.';
        header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
    }
} else {
    $_SESSION['error_messages'] = "User must be logged in.";
    header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
    exit();
}


