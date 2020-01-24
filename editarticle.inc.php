<?php

if(isset($_POST['update-submit'])) {

    include_once 'dbh.inc.php';

    date_default_timezone_set('America/Los_Angeles');

    $id = $_POST['id']; // ID of article to edit, passed via hidden input
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $time = "Edited " . date("F jS, Y - h:i A");

    $sql = "UPDATE Articles SET author='" . $author . "', title='" . $title . "', subtitle='" . $subtitle . "', body='" . $body . "', date='" . $time . "' WHERE id='" . $id . "';";
    
    if(mysqli_query($conn, $sql)) { 
        header('Location: login.php?status=postsuccess'); 
    } else {
        header('Location: login.php?status=posterror');
        exit();
    }

    /*
    if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){

        $target_dir = "medias/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            header('Location: login.php?status=filealreadyexists');
        } else {
    
            // Check if file is supported image
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {
    
                $sql = "UPDATE Articles SET author='" . $author . "', title='" . $title . "', subtitle='" . $subtitle . "', imagepath='" . $target_file . "', body='" . $body . "', date='" . $time . "' WHERE id='" . $id . "';";
                
                if(mysqli_query($conn, $sql)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        header('Location: login.php?status=updatesuccess');
                    } else {
                        header('Location: login.php?status=posterrorupload');
                    }
                } else {
                    header('Location: login.php?status=posterror');
                    exit();
                }
            } else if ($imageFileType == "mp4") {
            // Check if file is supported video
    
            $sql = "UPDATE Articles SET author='" . $author . "', title='" . $title . "', subtitle='" . $subtitle . "', videopath='" . $target_file . "', body='" . $body . "', date='" . $time . "' WHERE id='" . $id . "';";
                
                if(mysqli_query($conn, $sql)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        header('Location: login.php?status=updatesuccess');
                    } else {
                        header('Location: login.php?status=posterrorupload');
                    }
                } else {
                    header('Location: login.php?status=posterror');
                    exit();
                }
            } else {
                header ('Location: login.php?error=filenotsupported');
            }
        
        }
    }else{
        // user hasn't uploaded anything

        $sql = "UPDATE Articles SET author='" . $author . "', title='" . $title . "', subtitle='" . $subtitle . "', imagepath='', videopath='', body='" . $body . "', date='" . $time . "' WHERE id='" . $id . "';";
        
        if(mysqli_query($conn, $sql)) { 
            header('Location: login.php?status=postsuccess'); 
        } else {
            header('Location: login.php?status=posterror');
            exit();
        }
    }
    */
}

?>