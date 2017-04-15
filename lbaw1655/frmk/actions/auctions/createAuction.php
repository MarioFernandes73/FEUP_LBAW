<?php
include_once('../../config/init.php');
include_once('../../database/auctions.php');


if(isset($_SESSION['idUser'])){
    if($_SESSION['state'] != 'Banned' && $_SESSION['state'] != 'Inactive'){

        /*Creates the Auction*/

        $description = '';
        $state = 'Scheduled';
        if(isset($_POST['description']))
            $description = $_POST['description'];

        $now = new DateTime();
        $time = $now->format('Y-m-d H:i:s');    // MySQL datetime format

        if($_POST['startdate'] <= $time)
            $state = 'Opened';


        /*É preciso ter cuidados especiais caso a data seja inferior a data actual !!!!!!!!!!!!!!!!!!!!!!!!!*/

        createAuction($_POST['name'],$_POST['category'],$_POST['baseprice'],$_POST['type'],$_POST['startingdate'],
            $_POST['durationhours'],$description,$state,$_SESSION['iduser']);

        /*Upload of photos*/

        $photos = array();

        $total = count($_FILES['upload']['name']);
        $totalSize = 0;

        for($i=0; $i<$total; $i++) {
            $totalSize += $_FILES['upload']['size'][$i];
        }

        if ($totalSize < 50000000) {
            // Loop through each file
            for ($i = 0; $i < $total; $i++) {

                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                echo $tmpFilePath;

                //Make sure we have a filepath
                if ($tmpFilePath != "") {
                    $imageFileType = pathinfo($_FILES["upload"]["name"][$i], PATHINFO_EXTENSION);

                    echo 'photo uploaded' . "<br>";

                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        echo $imageFileType . "<br>";
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    } else {
                        echo 'photo uploaded' . "<br>";

                        //Setup our new file path
                        $newFilePath = "../../images/auctions/" . $_POST['name'] . "_" . $i . '.' . $imageFileType;
                        echo $newFilePath . "<br>";

                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            echo 'photo uploaded' . "<br>";
                            $photos[$i] = array($_FILES['upload']['name'][$i], $newFilePath, $now->format('Y-m-d'));
                            echo print_r($photos[$i]) . "<br>";
                        }
                    }
                }
            }
        }

        /*Get Auction ID*/

        $idauction = getAuctionId($_POST['name'],$_POST['category'],$_POST['baseprice'],$_POST['type'],$_POST['startingdate'],
            $_POST['durationhours'],$_SESSION['iduser']);

        echo $idauction;

        addAuctionPhotos($idauction,$photos);

        header('Location: ../../pages/auctions/viewAuction.php?id=' . $idauction);

    }
}

