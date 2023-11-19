<?php
session_start();

if (isset($_POST['submit'])) {
    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize < 2000000) {
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../img/gallery/" . $imageFullName;

                include_once "dbh.php";

                if (empty($imageTitle) || empty($imageDesc)) {
                    header("Location: ../Gallery.php?upload=empty");
                    exit();
                } else {
                    $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die("SQL statement failed: " . mysqli_error($conn));
                    }

                    mysqli_stmt_bind_param($stmt, "sss", $imageTitle, $imageDesc, $imageFullName);
                    mysqli_stmt_execute($stmt);

                    move_uploaded_file($fileTempName, $fileDestination);

                    header("Location: ../Gallery.php?upload=success");
                    exit();
                }
            } else {
                echo "File size is too big!";
                exit();
            }
        } else {
            echo "You had an error!";
            exit();
        }
    } else {
        echo "You need to upload a proper file type!";
        exit();
    }
} else {
    header("Location: ../Gallery.php");
    exit();
}
?>

