<?php
include_once('../../database/tickets.php');

$message = $_POST['message'];
$title = $_POST['title'];
$category = $_POST['category'];

var_dump($_POST);

if (isset($_SESSION['iduser'])) {

    try {

        $msg = createTicket($_SESSION['iduser'], $title, $category, $message);
        if ($msg != "") {
            $_SESSION['error_messages'] = $msg;
            header('Location: ../../pages/authentication/homepage.php');
            exit();
        }

        $_SESSION['success_messages'] = 'Created ticket successfully';
        header('Location: ../../pages/authentication/homepage.php');

    } catch
    (PDOException $e) {
        $_SESSION['error_messages'] = 'Could not created ticket, please try again.';
        header('Location: ../../pages/authentication/homepage.php');
    }
} else {
    $_SESSION['error_messages'] = "User must be logged in.";
    header('Location: ../../pages/authentication/homepage.php');
    exit();
}
