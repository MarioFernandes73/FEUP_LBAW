<?php
include_once('../../database/auctions.php');
include_once('../../database/users.php');

if (!isset($_POST["idauction"]) || !isset($_POST["message"]) ){
    $_SESSION['error_messages'][] = 'Error receiving comment auction.';
    header('Location: ../../index.php');
    die();
}

$idauction = trim(strip_tags($_POST['idauction']));
$message = trim(strip_tags($_POST['message']));

$idcomment = -1;
$date = new DateTime();
$res = 0;
$photos = array();

if (isset($_SESSION['iduser'])) {

    //Create comment
    try {

        if ($message == "" && sizeof($_FILES) == 0) {
            $res = "Comment without any message or file. Please try again";
            echo json_encode(array("result" => $res));
            exit();
        }

        $res = createComment($idauction, $_SESSION['iduser'], $date->format('Y-m-d H:i:s'), $message);

        if ($res != 0) {
            echo json_encode(array("result" => $res));
            exit();
        }

        //Add files
        $photos = array();
        $totalSize = 0;
        //var_dump($_FILES);
        foreach ($_FILES as $file) {
            $totalSize += $file['size'];
        }

        if ($totalSize > $TOTAL_SIZE_IMAGES) {
            $res = "The uploaded files in total have more than 5MB. Please upload files with a total capacity bellow 5MB.";
            echo json_encode(array("result" => $res));
            exit();
        }

        $uploaddir = $BASE_DIR . 'images/auctions/comments/' . $idauction;
        $i = 0;

        if (!file_exists($BASE_DIR . 'images/auctions/comments/' . $idauction))
            mkdir($BASE_DIR . 'images/auctions/comments/' . $idauction, 0777, true);

        foreach ($_FILES as $file) {

            $tmppath = $file['tmp_name'];

            if ($tmppath != "") {

                $type = pathinfo($file['name'], PATHINFO_EXTENSION);

                if ($type != 'jpg' && $type != 'png' && $type != 'jpeg' && $type != 'gif') {
                    $res = "Sorry, only JPG, JPEG, PNG & GIF files allowed.";
                    echo json_encode(array("result" => $res));
                    exit();
                } else {
                    $idcomment = getIdComment($idauction, $_SESSION['iduser'], $date->format('Y-m-d H:i:s'), $message);

                    //Setup our new file path
                    $pathimage = "images/auctions/comments/" . $idauction . "/" . $idcomment . '_' . $i . "." . $type;
                    $newFilePath = $uploaddir . "/" . $idcomment . "_" . $i . "." . $type;

                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmppath, $newFilePath)) {

                        $msg = addPhotosComment($idcomment, $file['name'], $pathimage, $date->format('Y-m-d'));
                        array_push($photos, array('name' => $file['name'], 'path' => $pathimage));

                        if ($msg != "") {
                            unlink($newFilePath);
                            echo json_encode(array("result" => $msg));
                            exit();
                        }
                    } else {
                        $res = "Error uploading files. Please try again.";
                        echo json_encode(array("result" => $res));
                        exit();
                    }
                    $i = $i + 1;
                }
            }
        }

    } catch (PDOException $e) {
        $res = "Could not comment. Please try again.";
        echo json_encode(array("result" => $res));
        exit();
    }

} else {
    $res = "User must be authenticated to proceed.";
}

echo json_encode(array("result" => $res, "photos" => $photos, "state" => $_SESSION['state'], 'date' => $date->format('Y-m-d')));