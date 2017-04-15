<?php

function addFile($name, $path, $metadata){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"File\" WHERE name=? AND path=?");
    $stmt->execute(array($name,$path));

    if(sizeof($stmt->fetchAll()) > 0)
        return -1;

    $stmt = $conn->prepare("INSERT INTO \"File\" (name,path,metadata) VALUES (?,?,?)");
    $stmt->execute(array($name, $path, $metadata));
}

function getFileId($name, $path){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"File\" WHERE name=? AND path=?");
    $stmt->execute(array($name,$path));

    return $stmt->fetch()['idfile'];
}

function addAImagesAuction($idfile,$idauction){
    global $conn;

    $stmt = $conn->prepare("INSERT INTO \"ImagesAuction\" (idfile,idauction) VALUES (?,?)");
    $stmt->execute(array($idfile,$idauction));
}