<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');

if ($_GET['lastMinute']) {
    $auctions = auctionsLMO();
} else if ($_GET['hot']) {
    $auctions = auctionsHot();
} else {
    $auctions = getAdvancedSearchedAuctions($_GET['offset'],$_GET['name'],$_GET['rating'],$_GET['category'],$_GET['type'],$_GET['date'],$_GET['duration']);
}

foreach ($auctions as $key => $auction) {

    unset($photo);
    if (file_exists($BASE_DIR . 'images/auctions/' . $auction['name'] . '_0.png'))
        $photo = 'images/auctions/' . $auction['name'] . '_0.png';
    if (file_exists($BASE_DIR . 'images/auctions/' . $auction['name'] . '_0.jpg'))
        $photo = 'images/auctions/' . $auction['name'] . '_0.jpg';
    if (!$photo)
        $photo = 'images/assets/auctionDefault.jpg';

    $auctions[$key]['photo'] = $photo;
}

echo json_encode($auctions);

