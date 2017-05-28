<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');

if (isset ( $_GET ["hot"] ))
    $hot = trim(strip_tags($_GET["hot"]));
else
    $hot = false;

if (isset ( $_GET ["lastMinute"] ))
    $lmo = trim(strip_tags($_GET["lastMinute"]));
else
    $lmo = false;

if (isset ( $_GET ["name"] ))
    $name = trim(strip_tags($_GET["name"]));
else
    $name = "";

if (isset ( $_GET ["rating"] ))
    $rating = trim(strip_tags($_GET["rating"]));
else
    $rating = "";

if (isset ( $_GET ["category"] ))
    $category = trim(strip_tags($_GET["category"]));
else
    $category = "";

if (isset ( $_GET ["type"] ))
    $type = trim(strip_tags($_GET["type"]));
else
    $type = "";

if (isset ( $_GET ["startingdate"] ))
    $date = trim(strip_tags($_GET["startingdate"]));
else
    $date = "";

if (isset ( $_GET ["durationhours"] ))
    $duration = trim(strip_tags($_GET["durationhours"]));
else
    $duration = "";

if (isset ( $_GET ["fullTextSearch"] ))
    $fts = trim(strip_tags($_GET["fullTextSearch"]));
else
    $fts = false;

if (isset ( $_GET ["offset"] ))
    $offset = trim(strip_tags($_GET["offset"]));
else
    $offset = 0;

if ($lmo) {
    $auctions = auctionsLMO();
} else if ($hot) {
    $auctions = auctionsHot();
} else if($fts != false) {
    $auctions = getFullTextSearch($fts);
} else {
    $auctions = getAdvancedSearchedAuctions($offset,$name,$rating,$category,$type,$date,$duration);
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

