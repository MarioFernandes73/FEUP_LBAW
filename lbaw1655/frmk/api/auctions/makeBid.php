<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');

$auction_info= getLastBid($_GET['idauction'])[0];

if (isset($_SESSION['iduser'])) {
    if ($_SESSION['state'] == 'Validated' || $_SESSION['state'] != 'Administrator') {
        if ($auction_info.currentprice > $_GET['bidvalue']) {
            print("ok");
        } else {
            $_SESSION['field_errors'][] = "The bid value is lower than the current price. Please insert a value above.";
            return;
        }
    }
    else{
        $_SESSION['error_messages'][] = "You must be a validated user or an administrator to bid on an auction.";
        return;
    }
}
else{
    $_SESSION['error_messages'][] = "You must login to bid on an auction.";
    return;
}