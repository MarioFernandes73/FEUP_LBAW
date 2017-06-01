<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');
include_once($BASE_DIR . 'database/tickets.php');

if (!isset($_POST["idauction"])) {
    $_SESSION['error_messages'][] = 'Error receiving comment.';
    header('Location: ../../index.php');
    die();
}
$idauction = trim(strip_tags($_POST['idauction']));

if (isset($_POST["message"])) {
    $message = trim(strip_tags($_POST['message']));
} else {
    $message = '';
}
$date = new DateTime();

if (isset($_SESSION['iduser'])) {
    try {
        $msg = createComment($idauction, $_SESSION['iduser'], $date->format('Y-m-d H:i:s'), $message);
        if ($msg != "")
            throw new PDOException($msg);

        $_SESSION['success_messages'] = 'Comment registered successfully';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    } catch (PDOException $e) {
        $_SESSION['error_messages'] = 'Error commenting.';
        header('Location: ../../pages/authentication/homepage.php');
    }

    $photos = array();

    $total = count($_FILES['upload']['name']);
    $totalSize = 0;

    for ($i = 0; $i < $total; $i++) {
        $totalSize += $_FILES['upload']['size'][$i];
    }

    if ($totalSize < $TOTAL_SIZE_IMAGES && $totalSize > 0) {
        // Loop through each file
        for ($i = 0; $i < $total; $i++) {

            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                $imageFileType = pathinfo($_FILES["upload"]["name"][$i], PATHINFO_EXTENSION);

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $_SESSION['error_messages'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
                    exit();
                } else {
                    try {
                        $idcomment = getIdComment($idauction, $_SESSION['iduser'], $date->format('Y-m-d H:i:s'), $message);
                        //Setup our new file path
                        $pathimage = "images/auctions/comments/" . $idcomment . "_" . $i . '.' . $imageFileType;
                        $newFilePath = $BASE_DIR . $pathimage;

                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $now = new DateTime();
                            $photos[$i] = array($_FILES['upload']['name'][$i], $pathimage, $now->format('Y-m-d'));

                            $msg = addPhotosComment($idcomment, $photos);
                            if ($msg != "") {
                                $_SESSION['error_messages'] = $msg;
                                header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
                            }

                            $_SESSION['success_messages'] = "The file " . $_FILES['upload']['name'][$i] . " was uploaded with success.";
                            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
                            exit();
                        } else {
                            $_SESSION['error_messages'] = "Error uploading files. Please try again.";
                            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
                            exit();
                        }
                    } catch (PDOException $e) {
                        $_SESSION['error_messages'][] = 'Try later';
                        header('Location: ../../index.php');
                        die();
                    }
                }

            } else {
                $_SESSION['error_messages'] = "The file could not be uploaded.";
                header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
                exit();
            }
        }
    }
} else {
    $_SESSION['error_messages'] = "User must be authenticated to proceed.";
    header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
    exit();
}