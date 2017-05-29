<?php
include_once('../../database/tickets.php');

if (!isset($_POST["category"])) {
    $_SESSION['error_messages'][] = 'Error invalid category.';
    die();
}
$category = trim(strip_tags($_POST['category']));

if (!isset($_POST["message"])) {
    $message = null;
} else {
    $message = trim(strip_tags($_POST['message']));
}

if (!isset($_POST["title"])) {
    $title = null;
} else {
    $title = trim(strip_tags($_POST['title']));
}

if (isset($_SESSION['iduser'])) {

    try {
        $msg = createTicket($_SESSION['iduser'], $title, $category, $message);
        if ($msg != "") {
            $_SESSION['error_messages'] = $msg;
            header('Location: ../../pages/authentication/homepage.php');
            exit();
        }

        $_SESSION['success_messages'] = 'Ticket created successfully';
        header('Location: ../../pages/authentication/homepage.php');

    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = 'Try later';
        header('Location: ../../index.php');
        die();
    }
} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location: ../../pages/authentication/homepage.php');
    exit();
}
