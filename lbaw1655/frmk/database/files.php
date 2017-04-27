<?php

<<<<<<< HEAD
function addFile($name, $path, $metadata)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"File\" WHERE name=? AND path=?");
    $stmt->execute(array($name, $path));

    if (sizeof($stmt->fetchAll()) > 0)
=======
function addFile($name, $path, $metadata){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"File\" WHERE name=? AND path=?");
    $stmt->execute(array($name,$path));

    if(sizeof($stmt->fetchAll()) > 0)
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
        return -1;

    $stmt = $conn->prepare("INSERT INTO \"File\" (name,path,metadata) VALUES (?,?,?)");
    $stmt->execute(array($name, $path, $metadata));
}

<<<<<<< HEAD
function getFileId($name, $path)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM \"File\" WHERE name=? AND path=?");
    $stmt->execute(array($name, $path));
=======
function getFileId($name, $path){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"File\" WHERE name=? AND path=?");
    $stmt->execute(array($name,$path));
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692

    return $stmt->fetch()['idfile'];
}

<<<<<<< HEAD
function addAImagesAuction($idfile, $idauction)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"ImagesAuction\" (idfile,idauction) VALUES (?,?)");
    $stmt->execute(array($idfile, $idauction));
}

function addFileToTicketComment($idfile, $idticketcomment)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"FileTicketComment\" (idticketcomment,idfile) VALUES (?,?)");
    $stmt->execute(array($idfile, $idticketcomment));
}

=======
function addAImagesAuction($idfile,$idauction){
    global $conn;

    $stmt = $conn->prepare("INSERT INTO \"ImagesAuction\" (idfile,idauction) VALUES (?,?)");
    $stmt->execute(array($idfile,$idauction));
}
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
