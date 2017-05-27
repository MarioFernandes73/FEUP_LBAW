<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');
include_once($BASE_DIR . 'database/users.php');


if (isset($_SESSION['iduser'])) {
    if ($_SESSION['state'] == "Administrator" ){

        $name = $_POST["name"];
        $description = $_POST["description"];
        $idAuction = $_POST["idauction"];
        $category =  $_POST["category"];

        try {
            editAuction($idAuction, $_SESSION['iduser'], $name, $description, $category);
            //var_dump("aqio");
            $_SESSION['success_messages'][] = 'The auction was updated with success.';
            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction='. $idAuction);
            exit();
        } catch (PDOException $e) {
            $_SESSION['error_messages'][] = 'Could not change the auction. Please, try again.';
            header('Location: ../../pages/authentication/homepage.php');
            exit;
        }

    } else {
        $_SESSION['error_messages'] = "User without permissions to edit an auction.";
        header('Location:' . $BASE_URL . 'pages/auctions/editAuction.php');
        exit();
    }
} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location:' . $BASE_URL . 'pages/auctions/editAuction.php');
    exit();
}

