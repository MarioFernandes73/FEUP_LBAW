<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');

<<<<<<< HEAD
if (isset($_SESSION['iduser'])) {
    if ($_SESSION['state'] == 'Validated' || $_SESSION['state'] == 'Administrator') {
=======

if(isset($_SESSION['iduser'])) {
    if ($_SESSION['state'] != 'Banned' && $_SESSION['state'] != 'Inactive' && $_SESSION['state'] != 'Registered') {
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692

        /*Upload of photos*/

        $photos = array();

        $total = count($_FILES['upload']['name']);
        $totalSize = 0;

        for ($i = 0; $i < $total; $i++) {
            $totalSize += $_FILES['upload']['size'][$i];
        }

        if ($totalSize < 50000000 && $totalSize > 0) {
            // Loop through each file
            for ($i = 0; $i < $total; $i++) {

                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                //Make sure we have a filepath
                if ($tmpFilePath != "") {
                    $imageFileType = pathinfo($_FILES["upload"]["name"][$i], PATHINFO_EXTENSION);

                    echo 'photo uploaded' . "<br>";

                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $_SESSION['error_messages'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
<<<<<<< HEAD
                        header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
=======
                        header('Location:' . $BASE_URL .  'pages/auctions/createAuction.php');
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                        exit();
                    } else {

                        //Setup our new file path
                        $newFilePath = $BASE_DIR . "images/auctions/" . $_POST['name'] . "_" . $i . '.' . $imageFileType;

                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $now = new DateTime();
                            $photos[$i] = array($_FILES['upload']['name'][$i], $newFilePath, $now->format('Y-m-d'));
                            $_SESSION['success_messages'] = "The file " . $_FILES['upload']['name'][$i] . " was uploaded with success.";
<<<<<<< HEAD
                        } else {
                            $_SESSION['error_messages'] = "Error on uploading files. Please try again.";
                            header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
                            exit();
                        }
                    }
                } else {
                    $_SESSION['error_messages'] = "The file could not be uploaded.";
                    header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
=======
                        }
                        else{
                            $_SESSION['error_messages'] = "Error on uploading.";
                            header('Location:' . $BASE_URL .  'pages/auctions/createAuction.php');
                            exit();
                        }
                    }
                }
                else{
                    $_SESSION['error_messages'] = "The file could not be uploaded.";
                    header('Location:' . $BASE_URL .  'pages/auctions/createAuction.php');
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
                    exit();
                }
            }
        }

        /*Creates the Auction*/

        $description = '';
        $state = 'Scheduled';
        if (isset($_POST['description']))
            $description = $_POST['description'];

        $now = new DateTime();
        $curr_time = $now->format('Y-m-dTH:i');    // MySQL datetime format

<<<<<<< HEAD
        if ($_POST['startingdate'] <= $curr_time) {
=======
        if($_POST['startingdate'] <= $curr_time){
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
            $state = 'Opened';
            $_POST['startingdate'] = $now->format('Y-m-d H:i:s');
        }

<<<<<<< HEAD
        /*Saves de double value to an integer*/
        $baseprice = $_POST['baseprice'] * 100;

        try {
            createAuction($_POST['name'], $_POST['category'], $baseprice, $_POST['type'], $_POST['startingdate'],
                $_POST['durationhours'], $description, $state, $_SESSION['iduser']);

            /*Get Auction ID*/

            $idauction = getAuctionId($_POST['name'], $_POST['category'], $baseprice, $_POST['type'], $_POST['startingdate'],
                $_POST['durationhours'], $_SESSION['iduser']);


            addAuctionPhotos($idauction, $photos);

            $_SESSION['success_messages'] = "Auction created with success.";

            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
            exit();

        } catch (PDOException $e) {
            $_SESSION['error_messages'] = "Could not create auction, please try again";
            header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
            exit();
        }


    } else {
        $_SESSION['error_messages'] = "User must be a validated user or administrator to create an auction.";
        header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
        exit();
    }
} else {
    $_SESSION['error_messages'] = "User must be logged in.";
    header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
=======
        createAuction($_POST['name'], $_POST['category'], $_POST['baseprice'], $_POST['type'], $_POST['startingdate'],
            $_POST['durationhours'], $description, $state, $_SESSION['iduser']);

        /*Get Auction ID*/

        $idauction = getAuctionId($_POST['name'], $_POST['category'], $_POST['baseprice'], $_POST['type'], $_POST['startingdate'],
            $_POST['durationhours'], $_SESSION['iduser']);


        addAuctionPhotos($idauction, $photos);

        $_SESSION['success_messages'] = "Auction created with success.";

        header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
        exit();

    } else {
        $_SESSION['error_messages'] = "User must be a validated user or administrator to create an auction.";
        header('Location:' . $BASE_URL .  'pages/auctions/createAuction.php');
        exit();
    }
}
else{
    $_SESSION['error_messages'] = "User must be logged in.";
    header('Location:' . $BASE_URL .  'pages/auctions/createAuction.php');
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
    exit();
}


<<<<<<< HEAD

=======
>>>>>>> e66e7325c00a70a1ffdc7736edf730f61a3ee692
