<?php
include_once('../../database/auctions.php');
include_once('../../database/users.php');

$idauction = $_POST['idauction'];
$message = $_POST['message'];
$date = new DateTime();
$files = $_FILES['upload'];
$res;       //for errors


if (isset($_SESSION['iduser'])) {


    //Create comment
   /* try {
        $res=createComment($idauction, $_SESSION['iduser'], $date->format('Y-m-d H:i:s'), $message);
    } catch (PDOException $e) {
        $res = 'Could not comment, please try again.';
        echo json_encode(array("result" => $res));
        exit();
    }*/

    //Add files
    $photos = array();

    $total = count($files['name']);
    $totalSize = 0;
    // var_dump($total);

    echo json_encode(array("result" => ($files[0]['name'])));
    exit();

    for ($i = 0; $i < $total; $i++) {
        $totalSize += $files['size'][$i];
    }

    if ($totalSize < $TOTAL_SIZE_IMAGES && $totalSize > 0) {
        // Loop through each file
        for ($i = 0; $i < $total; $i++) {

            //Get the temp file path
            $tmpFilePath = $files['tmp_name'][$i];

            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                $imageFileType = pathinfo($files["name"][$i], PATHINFO_EXTENSION);

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $res = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    echo json_encode(array("result" => $res));
                    exit();

                } else {
                    $idcomment = getIdComment($idauction, $_SESSION['iduser'], $date->format('Y-m-d H:i:s'), $message);
                    //Setup our new file path
                    $pathimage="images/auctions/comments/" . $idcomment . "_" . $i . '.' . $imageFileType;
                    $newFilePath = $BASE_DIR .  $pathimage;

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $now = new DateTime();
                        $photos[$i] = array($files['name'][$i], $pathimage, $now->format('Y-m-d'));

                        $res = addPhotosComment($idcomment, $photos);
                        if ($msg != "") {
                            echo json_encode(array("result" => $res));
                            exit();
                        }

                        $res = 0;
                        echo json_encode(array("result" => $res));
                        exit();
                    } else {
                        $res = "Error on uploading files. Please try again.";
                    }
                }

            } else {
                $res = "The file could not be uploaded.";
            }
        }
    }
} else {
    $res = "User must be logged in.";
}

echo json_encode(array("result" => $res));