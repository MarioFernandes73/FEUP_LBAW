<?php
include_once('../../config/init.php');
include_once('../../database/auctions.php');
include_once('../../database/users.php');


$auction = getAuction($_GET['idauction']);
$idowner = $auction['idowner'];
$comments = getComentPathAuction($auction['idauction']);
//$comments = getAuctionComments($auction['idauction']);
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
if($endingDate < $currentDate){
    $timeLeft = "0 days 00:00:00";
} else{
    $timeLeft =  $currentDate->diff($endingDate)->format('%a days %h:%i:%s');
}


//get photos
$photoPathIds =getAuctionPhotosPathId($auction['idauction']);

if($photoPathIds!=null) {
    foreach ($photoPathIds as $photo) {
        $photoArray[] = $photo;
    }
}
else {
    $photoArray[]['path'] = 'images/assets/auctionDefault.jpg';
}

$smarty->assign('iduser',$_SESSION['iduser']);
$smarty->assign('currentAuction',$auction);
$smarty->assign('currentAuctionOwner',getUser($idowner));
$smarty->assign('currentAuctionComments',$comments);
$smarty->assign('notifications',$notifications);
$smarty->assign('timeLeft',$timeLeft);
$smarty->assign('currentAuctionPhotos',$photoArray);

$smarty->display('auctions/viewAuction.tpl');