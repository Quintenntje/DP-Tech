<?php

function emptyInputSignup($name, $voornaam, $email, $pass, $confirmpass){
    $result;
    if(empty($name) || empty($voornaam) || empty($pass) || empty($confirmpass)){
        $result = true;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidName($name){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidVoornaam($voornaam){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $voornaam)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
}

function pwdMatch($pass, $confirmpass){
    $result;
    if ($pass !== $confirmpass){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email){
    $sql = "SELECT * FROM inlogklant WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

require_once 'password_compat-master/lib/password.php';


function createUser($conn, $voornaam, $name, $email, $pass) {
    $fullName = $voornaam . ' ' . $name; 
    $sql = "INSERT INTO inlogklant (Naam, Email, Wachtwoord) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtFailed");
        exit();
    }
    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../register.php?error=none");

}


function emptyInputLogin($email, $pass){
    $result;
    if(empty($email) || empty($pass)){
        $result = true;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pass){
    
    $emailExists = emailExists($conn, $email);

    if($emailExists === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $emailExists["Wachtwoord"];
    $checkPwd = password_verify($pass, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    elseif($checkPwd === true){
        session_start();
        $_SESSION["email"] = $emailExists["Email"];
        
        if ($emailExists["isAdmin"] == 1) {
            $_SESSION["isAdmin"] = true;
        } else {
            $_SESSION["isAdmin"] = false;
        }

        header("location: ../index.php");
        exit();
    }
}

