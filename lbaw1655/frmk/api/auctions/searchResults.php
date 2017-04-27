<?php
include_once('../../config/init.php');
<<<<<<< HEAD
include_once($BASE_DIR . 'database/auctions.php');

if ($_GET['lastMinute']) {
    $auctions = auctionsLMO();
} else if ($_GET['hot']) {
    $auctions = auctionsHot();
} else {
=======
include_once($BASE_DIR .'database/auctions.php');

if($_GET['lastMinute']) {
    $auctions = auctionsLMO();
}
else if($_GET['hot']) {
    $auctions = auctionsHot();
}
else {
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    $auctions = null;
}

foreach ($auctions as $key => $auction) {

    unset($photo);
<<<<<<< HEAD
    if (file_exists($BASE_DIR . 'images/auctions/' . $auction['name'] . '_0.png'))
        $photo = 'images/auctions/' . $auction['name'] . '_0.png';
    if (file_exists($BASE_DIR . 'images/auctions/' . $auction['name'] . '_0.jpg'))
        $photo = 'images/auctions/' . $auction['name'] . '_0.jpg';
=======
    if (file_exists($BASE_DIR.'images/auctions/'.$auction['name'].'_0.png'))
        $photo = 'images/auctions/'.$auction['name'].'_0.png';
    if (file_exists($BASE_DIR.'images/auctions/'.$auction['name'].'_0.jpg'))
        $photo = 'images/auctions/'.$auction['name'].'_0.jpg';
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    if (!$photo)
        $photo = 'images/assets/default.png';

    $auctions[$key]['photo'] = $photo;
}

echo json_encode($auctions);

