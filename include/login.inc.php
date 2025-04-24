<?php

if (isset($_POST['submit'])){

    $email = $_POST['email'];
    $pass = $_POST['password']; 

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if (emptyInputLogin($email ,$pass) !== false) {
        header("location:../login.php?error=emptyInput");
       exit();
    }

    loginUser($conn,$email,$pass);

}
else{
    header("Location: ../login.php");
    exit();
}

?>
