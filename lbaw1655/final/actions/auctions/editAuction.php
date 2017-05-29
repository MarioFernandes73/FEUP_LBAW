<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');
include_once($BASE_DIR . 'database/users.php');

if (isset($_SESSION['iduser']))
{
    if ($_SESSION['state'] == "Administrator" )
    {
        if(!isset($_POST["idauction"])){
            $_SESSION['error_messages'][] = 'Error receiving auction.';
            header('Location:' . $BASE_URL .$_SERVER['HTTP_REFERER']);
            exit();
        }
        $idAuction = trim(strip_tags($_POST["idauction"]));

        if(isset($_POST["name"]))
            $name = trim(strip_tags($_POST["name"]));
        else
            $name = null;

        if(isset($_POST["description"]))
            $description = trim(strip_tags($_POST["description"]));
        else
            $description = null;

        if(isset($_POST["category"]))
            $category = trim(strip_tags($_POST["category"]));
        else
            $category = null;

        try {
            editAuction($idAuction, $_SESSION['iduser'], $name, $description, $category);
            $_SESSION['success_messages'][] = 'The auction was updated with success.';
            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction='. $idAuction);
            exit();
        }
        catch (PDOException $e) {
            $_SESSION['error_messages'][] = 'Could not change the auction. Please, try again.';
            header('Location:' . $BASE_URL .$_SERVER['HTTP_REFERER']);
            exit();
        }

    } else {
        $_SESSION['error_messages'] = "User without permissions to edit an auction.";
        header('Location:' . $BASE_URL .$_SERVER['HTTP_REFERER']);
        exit();
    }
} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location:' . $BASE_URL .$_SERVER['HTTP_REFERER']);
    exit();
}

