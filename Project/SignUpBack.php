<?php


session_start();


$_SESSION = array();


session_destroy();


if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $Username = $_POST["Username"];
    $FullName = $_POST["FullName"];
    $Gender = $_POST["gender"];  
    $password = $_POST["password"];
    $password_confirm = $_POST["passwordrpt"];  
    $date_of_birth = $_POST["dateofbirth"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email,$Username,$FullName,$Gender,$password,$password_confirm,$date_of_birth) !== false){
        header("location:SignUp.php?error=emptyinput");
        exit();
    }
    
        if(invalidUid($Username) !== false){
        header("location:SignUp.php?error=invalidUid");
        exit();
    }

     if(invalidEmail($email) !== false){
        header("location:SignUp.php?error=invalidemail");
        exit();
    }

 
     if(passwordmatch($password,$password_confirm) !== false){
        header("location:SignUp.php?error=passwordsdontmatch");
        exit();
    }


     if(UidExists($conn, $Username,$email) !== false){
        header("location:SignUp.php?error=Usernametaken");
        exit();
    }
CreateUser($conn,$email,$Username,$FullName,$Gender,$password,$password_confirm,$date_of_birth);

$userData = array(
         $Username,
        $FullName,
        $email,
         $password,
        $Gender,
        $date_of_birth
    );

 $allUserData = file_exists('user_data.json') ? json_decode(file_get_contents('user_data.json'), true) : array();

    
    $allUserData[] = $userData;

    
    file_put_contents('user_data.json', json_encode($allUserData));

  
    header("location:header.php");
}
else{
    header  ("location:SignUp.php");
}