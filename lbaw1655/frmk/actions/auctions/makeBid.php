<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');

try{
    $tmp = getLastBid($_POST['idauction']);

    if(sizeof($tmp) == 0)
        $tmp['ammount'] = 0;

    $bidvalue = $_POST['bidvalue'] *100;

    if (isset($_SESSION['iduser'])) {
        if ($_SESSION['state'] == 'Validated' || $_SESSION['state'] == 'Administrator') {
            if ($tmp['ammount'] < $bidvalue && $_POST['baseprice'] <= $bidvalue) {

                $date = new DateTime();
                $res = bidAuction($_POST['idauction'],$_SESSION['iduser'],$bidvalue, $date->format('Y-m-d H:i:s'));

                if($res == -1){
                    $_SESSION['error_messages'][] = "Bid could not be created.";
                    header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $_POST['idauction']);
                    exit();
                }

                $_SESSION['success_messages'][] = "Bid posted with success!";
                header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $_POST['idauction']);
                exit();

            } else {
                $_SESSION['field_errors'][] = "The value of the bid must be above the current price and above or equal the 
                base price.";
                header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $_POST['idauction']);
                exit();
            }
        }
        else{
           $_SESSION['error_messages'][] = "You must be a validated user or an administrator to bid on an auction.";
            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $_POST['idauction']);
            exit();
        }
    }
    else{
       $_SESSION['error_messages'][] = "You must login to bid on an auction.";
        header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $_POST['idauction']);
        exit();
    }
}
catch(PDOException $e){
    $_SESSION['error_messages'][] = "Error. Please try again.";
    header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $_POST['idauction']);
    exit();
}
