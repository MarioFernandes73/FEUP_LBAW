<?php
include_once('../../database/auctions.php');

$idcomment = trim(strip_tags($_POST['idcomment']));

if (isset($_SESSION['iduser'])) {
    try {

        $res = removeComment($_SESSION['iduser'], $idcomment);
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
} else
    $res = "User must be authenticated to proceed.";

echo json_encode(array("result" => $res));