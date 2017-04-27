<?php
include_once('../../config/init.php');
include_once('../../database/auctions.php');
include_once('../../database/users.php');


$auction = getAuction($_GET['idauction']);
$idowner = $auction['idowner'];
$comments = getAuctionComments($auction['idauction']);
$bids = getAuctionBids($auction['idauction']);

//order notifications
function compareNotifications($a, $b){
    return strcmp($a->date, $b->date);
}
$notifications = array_merge($comments,$bids);
usort($notifications, "compareNotifications");

//get timeLeft
$hoursLeft = $auction['durationhours'];

$startingDate = new DateTime($auction['startingdate']);
$endingDate = $startingDate->add(new DateInterval('PT'.$hoursLeft.'H'));
$currentDate = new DateTime();
$timeLeft =  $currentDate->diff($endingDate)->format('%a days %h:%i:%s');

//get photos
$photoIds = getAuctionPhotosIDs($auction['idauction']);


foreach($photoIds as $photo) {
$photoArray[] = $photo;
}

$smarty->assign('currentAuction',$auction);
$smarty->assign('currentAuctionOwner',getUser($idowner));
$smarty->assign('currentAuctionComments',$comments);
$smarty->assign('notifications',$notifications);
$smarty->assign('timeLeft',$timeLeft);
$smarty->assign('currentAuctionPhotos',$photoArray);


$smarty->display('auctions/viewAuction.tpl');