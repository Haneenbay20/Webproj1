<?php
include_once 'header.php';
include_once 'includes/dbh.php';
$_SESSION['username'] = "Admin";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
                $fileDestination = "img/gallery/" . $imageFullName;

                $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    die("SQL statement failed: " . mysqli_error($conn));
                }

                mysqli_stmt_bind_param($stmt, "sss", $imageTitle, $imageDesc, $imageFullName);
                mysqli_stmt_execute($stmt);

                move_uploaded_file($fileTempName, $fileDestination);

                header("Location: Gallery.php");
                exit();
            } else {
                echo "File size is too big!";
            }
        } else {
            echo "You had an error!";
        }
    } else {
        echo "You need to upload a proper file type!";
    }
}
?>

<main>
    <section class="Gallery-links">
        <div class="wrapper">
            <h2>Gallery</h2>
            <div class="gallery-container">
                <?php
                $sql = "SELECT * FROM gallery";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="img/gallery/' . $row["imgFullNameGallery"] . '">
                                   <img src="img/gallery/' . $row["imgFullNameGallery"] . '" alt="' . $row["titleGallery"] . '">
                                   <h3>' . $row["titleGallery"] . '</h3>
                                   <p>' . $row["descGallery"] . '</p>
                               </a>';
                    }
                }
                ?>
            </div>

            <?php
            if (isset($_SESSION['username'])) {
                echo '<div class="upload">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" name="filename" placeholder="Filename...">
                            <input type="text" name="filetitle" placeholder="Imagetitle...">
                            <input type="text" name="filedesc" placeholder="Image description...">
                            <input type="file" name="file">
                            <button type="submit" name="submit">UPLOAD</button>
                        </form>
                    </div>';
            }
            ?>
        </div>
    </section>
</main>


    <style type="text/css">
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        .wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .Gallery-links {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        img {
            text-decoration: none;
            color: #333;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        img:hover {
            transform: scale(1.05);
        }

        img div {
            height: 150px;
            background-size: cover;
            background-position: center;
        }

        .upload {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        input {
            width: 48%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>