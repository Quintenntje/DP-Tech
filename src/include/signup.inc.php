<?php
if (isset($_POST['submit'])){

    $name = $_POST['firstname'];
    $voornaam = $_POST['Lastname'];
    $email = $_POST['email'];
    $pass = $_POST['password']; 
    $confirmpass = $_POST['confirmPassword'];

    $serverName="mysql";
    $DBUsername ="root";
    $DBPassword ="root";
    $DBName="dp-tech";

    $conn = mysqli_connect($serverName, $DBUsername, $DBPassword, $DBName);

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if (emptyInputSignup($name,$voornaam, $email ,$pass , $confirmpass) !== false) {
        header("location:../register.php?error=emptyInput");
       exit();
    }

    if (invalidname($name) !== false) {
        header("location:../register.php?error=emptyName");
       exit();
    }
    if(invalidVoornaam($voornaam) !== false){
        header("location:../register.php?error=emptyVoornaam");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location:../register.php?error=emptyEmail");
       exit();
    }
    if(pwdMatch($pass,$confirmpass) !== false) {
     header("location:../register.php?error=passDontMatch");
    exit();
}
    if(EmailExists($conn,$email) !== false){
        header("location:../register.php?error=EmailAlreadyExists");
        exit();
    }

    createUser($conn, $voornaam, $name, $email, $pass);

}
else{
    header("Location: ../register.php");
    exit();
}
