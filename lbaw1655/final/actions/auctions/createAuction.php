<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/auctions.php');
include_once($BASE_DIR . 'database/users.php');

if (isset($_POST['description'])){
    $name = trim(strip_tags($_POST['name']));
}
else{
    $_SESSION['error_messages'][] = 'Error receiving auction.';
    header('Location: ../../index.php');
    die();
}

if (isset($_SESSION['iduser']))
{
    if ($_SESSION['state'] == "Administrator" || $_SESSION['state'] == "Validated") {

        /**
         * Upload Photos
         */
        $photos = array();

        $total = count($_FILES['upload']['name']);
        $totalSize = 0;

        var_dump($total);
        for ($i = 0; $i < $total; $i++) {
            $totalSize += $_FILES['upload']['size'][$i];
        }

        if ($totalSize < $TOTAL_SIZE_IMAGES && $totalSize > 0)
        {
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
                        header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
                        exit();
                    }
                    else
                    {
                        //Setup our new file path
                        $pathImage = "images/auctions/" . $name . "_" . $i . '.' . $imageFileType;
                        $newFilePath = $BASE_DIR . $pathImage;

                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $now = new DateTime();
                            $photos[$i] = array($_FILES['upload']['name'][$i], $pathImage, $now->format('Y-m-d'));
                            $_SESSION['success_messages'] = "The file " . $_FILES['upload']['name'][$i] . " was uploaded with success.";
                        } else {
                            $_SESSION['error_messages'] = "Error uploading files. Please try again.";
                            header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
                            exit();
                        }
                    }
                } else {
                    $_SESSION['error_messages'] = "The file could not be uploaded.";
                    header('Location:' . $BASE_URL . 'pages/auctions/createAuction.php');
                    exit();
                }
            }
        }

        if(!isset($_POST['startingdate'])||!isset($_POST['baseprice'])||!isset($_POST['type'])||!isset($_POST['category'])||!isset($_POST['durationhours']))
        {
            $_SESSION['error_messages'][] = 'Error receiving arguments to create an auction.';
            header('Location: ../../index.php');
            exit();
        }else{
            $startingdate = trim(strip_tags($_POST['startingdate']));
            $baseprice = trim(strip_tags($_POST['baseprice']));
            $type = trim(strip_tags($_POST['type']));
            $category = trim(strip_tags($_POST['category']));
            $durationhours = trim(strip_tags($_POST['durationhours']));
        }

        if (isset($_POST['description']))
            $description = trim(strip_tags($_POST['description']));
        else
            $description ='';

        //Creates the Auction

        $now = new DateTime();
        $curr_time = $now->format('Y-m-dTH:i');    // MySQL datetime format

        if ($startingdate <= $curr_time) {
            $state = 'Opened';
            $_POST['startingdate'] = $now->format('Y-m-d H:i:s');
        }else{
            $state = 'Scheduled';
        }

        //Saves de double value to an integer
        $baseprice = $baseprice * 100;

        try {
            //call to create auction
            if($type == "Dutch"){
                $done = createAuctionDutch($name,$category, $baseprice,$type,$startingdate,$durationhours, $description,$state,$_SESSION['iduser']);
            } else {
                $done = createAuction($name,$category,$baseprice,$type,$startingdate,$durationhours,$description,$state,$_SESSION['iduser']);
            }

            if (!$done) {
                $_SESSION['error_messages'] = "User must be a validated user or administrator to create an auction.";
                header('Location: ../../index.php');
                exit();
            }

            //call to add photos
            $idauction = getAuctionId($name,$category, $baseprice,$type,$startingdate,$durationhours,$_SESSION['iduser']);
            addAuctionPhotos($idauction, $photos);

            $_SESSION['success_messages'] = "Auction created with success.";
            header('Location:' . $BASE_URL . 'pages/auctions/viewAuction.php?idauction=' . $idauction);
            exit();

        } catch (PDOException $e) {
            $_SESSION['error_messages'] = "Could not create auction, please try again";
            header('Location: ../../index.php');
            exit();
        }


    } else {
        $_SESSION['error_messages'] = "User must be a validated user or administrator to create an auction.";
        header('Location: ../../index.php');
        exit();
    }
} else {
    $_SESSION['error_messages'] = "User must be logged in.";
    header('Location: ../../index.php');
    exit();
}



