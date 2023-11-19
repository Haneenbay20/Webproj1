<?php
session_start();

if (isset($_POST["submit"])) {
    $UserName = $_POST["Username"];
    $Password = $_POST["password"];

   
    $inputs = file_get_contents("inputvalue.json");
    $inputs = json_decode($inputs, true);

    $found = false;

    foreach ($inputs as $input) {
        if ($input["name"] == $UserName && $input["password"] == $Password) {
            $_SESSION["name"] = $UserName;
            $found = true;
            header("Location:header.php"); 
            exit();
        }
    }

    if (!$found) {
      
        header("Location:Index.php?error=1");
        exit();
    }
} else {
  
    header("SignUp.php");
    exit();
}
