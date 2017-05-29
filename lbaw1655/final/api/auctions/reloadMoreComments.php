<?php
include_once('../../database/auctions.php');
include_once('../../database/users.php');

$idauction = $_POST['idauction'];
$offset = $_POST['offset'];

try {
    $comments = getComentPathAuction($idauction, $offset);
} catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Try later';
    header('Location: ../../index.php');
    die();
}
echo json_encode(array("result" => $comments, "state" => $_SESSION['state']));