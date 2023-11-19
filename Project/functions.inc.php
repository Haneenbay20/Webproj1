<?php  
function emptyInputSignup($FullName, $email, $Username, $Gender, $password, $password_confirm, $date_of_birth) {
    $result = false;

    if (empty($FullName) || empty($email) || empty($Username) || empty($Gender) || empty($password) || empty($password_confirm) || empty($date_of_birth)) {
        $result = true;
    }

    return $result;
}

function invalidUid($Username) {
    $result = false;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)) {
        $result = true;
    }

    return $result;
}

function invalidEmail($email) {
    $result = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;
}

function passwordmatch($password, $password_confirm) {
    $result = false;

    if ($password != $password_confirm) {
        $result = true;
    }

    return $result;
}

function CreateUser($conn, $FullName, $email, $Username, $Gender, $password, $date_of_birth) {
    $sql = "INSERT INTO users (UserName, UserEmail, UserUid, UserGender, UsersPassword, UserDOB) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.php?error=stmtfailed");
        exit();
    }

    $hashedPWD = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssss",$FullName, $email, $Username, $Gender, $hashedPWD, $date_of_birth);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: header.php?error=none");
    exit();
}

function UidExists($conn, $email, $Username) {
    $sql = "SELECT * from users WHERE UserUid = ? OR UserEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
?>