<?php
include_once('../../database/auctions.php');
include_once('../../database/users.php');

if(!isset($_SESSION['iduser'])) {
    $userState = "guest";
} else {
    $userState = getUser($_SESSION['iduser'])['state'];
}

if (isset ( $_GET ['idauction'] ))
    $idauction = trim(strip_tags($_GET['idauction']));
else{
    $_SESSION['error_messages'][] = 'Auction undefined.';
    header('Location: ../../index.php');
    exit();
}

$auction = getAuction($idauction);
$idowner = $auction['idowner'];
$comments = getComentPathAuction($auction['idauction']);
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
$photoPathIds = getAuctionPhotosPathId($auction['idauction']);
if($photoPathIds!=null) {
    foreach ($photoPathIds as $photo) {
        $photoArray[] = $photo;
    }
}
else {
    $photoArray[]['path'] = 'images/assets/auctionDefault.jpg';
}
//var_dump($comments);
$smarty->assign('iduser',$_SESSION['iduser']);
$smarty->assign('userState',$userState);
$smarty->assign('currentAuction',$auction);
$smarty->assign('currentAuctionOwner',getUser($idowner));
$smarty->assign('currentAuctionComments',$comments);
$smarty->assign('notifications',$notifications);
$smarty->assign('timeLeft',$timeLeft);
$smarty->assign('currentAuctionPhotos',$photoArray);
$smarty->assign('idcomment',-1);

$smarty->display('auctions/viewAuction.tpl');