<?php
include_once('../../config/init.php');
$state = $_GET["state"];
$category = $_GET["category"];
global $conn;
if($category == "null"){
    if($state == ""){
        $stmt = $conn->prepare("SELECT title, username FROM \"Ticket\" JOIN \"User\" ON \"Ticket\".iduser = \"User\".iduser LIMIT 10");
        $stmt->execute(array());
    }
    else{
        $stmt = $conn->prepare("SELECT title, username FROM \"Ticket\" JOIN \"User\" ON \"Ticket\".iduser = \"User\".iduser  WHERE solved=? LIMIT 10");
        $stmt->execute(array($state));
    }
}
else{
    $stmt = $conn->prepare("SELECT title, username FROM \"Ticket\" JOIN \"User\" ON \"Ticket\".iduser = \"User\".iduser  WHERE solved=? AND category=? LIMIT 10");
    $stmt->execute(array($state, $category));
}
$tickets = $stmt->fetchAll();
echo json_encode($tickets);