<?php
include_once('../../database/files.php');

function getAuctionId($name,$category,$baseprice,$type,$startingdate,$durationhours,$idowner){
    global  $conn;
    $stmt =  $conn->prepare("SELECT * FROM \"Auction\" WHERE name=? AND category=? AND 
baseprice=? AND type=? AND startingdate=? AND durationhours=? AND idowner=?");
    $stmt->execute(array($name,$category,$baseprice,$type,$startingdate,$durationhours,$idowner));
    return $stmt->fetch()['idauction'];
}
function createAuction($name, $category, $baseprice, $type, $startdate, $time, $description,$state,$idowner){
    global  $conn;
    $stmt =  $conn->prepare("INSERT INTO \"Auction\" (name,category,baseprice,currentprice,type,startingdate,
durationhours,description,state,idowner) VALUES (?,?,?,0,?,?,?,?,?,?)");
    $stmt->execute(array($name,$category,$baseprice,$type,$startdate,$time,$description,$state,$idowner));
}

function addAuctionPhotos($idauction,$photos){

    if(is_array($photos)){
        foreach($photos as $photo){
            if(addFile($photo[0],$photo[1],$photo[2]) != -1){
                $idfile = getFileId($photo[0],$photo[1]);
                addAImagesAuction($idfile,$idauction);
            }
        }
    }
    else
    {
        if(addFile($photos[0],$photos[1],$photos[2]) != -1){
            $idfile = getFileId($photos[0],$photos[1]);
            addAImagesAuction($idfile,$idauction);
        }
    }
}