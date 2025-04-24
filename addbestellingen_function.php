<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: register.php?error=notloggedin");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'include/dbh_inc.php';

    $machineID = $_POST['machine_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $gemeente = $_POST['gemeente'];

    $klantNummerQuery = "SELECT KlantNummer FROM inlogklant WHERE Email = '" . mysqli_real_escape_string($conn, $email) . "'";
    $klantNummerResult = mysqli_query($conn, $klantNummerQuery);
    $klantNummerRow = mysqli_fetch_assoc($klantNummerResult);
    $klantNummer = $klantNummerRow['KlantNummer'];

    $merkModelQuery = "SELECT Merk, Model, Prijs FROM machines WHERE ProductID = " . mysqli_real_escape_string($conn, $machineID);
    $merkModelResult = mysqli_query($conn, $merkModelQuery);
    $merkModelRow = mysqli_fetch_assoc($merkModelResult);
    $merk = $merkModelRow['Merk'];
    $model = $merkModelRow['Model'];
    $prijs = $merkModelRow['Prijs'];

    $aankoopdag = date('Y-m-d');

    $insertQuery = "INSERT INTO bestellingen (KlantNummer, ProductID, Merk, Model,Prijs, Naam, Email, Adres, Postcode, Gemeente, Hoeveelheid, Aankoopdag) VALUES ('$klantNummer', '$machineID', '$merk', '$model','$prijs', '$name', '$email', '$adres', '$postcode', '$gemeente', 1, '$aankoopdag')";
    mysqli_query($conn, $insertQuery);

    header("Location: machine.php?error=OrderSent");
    exit();
} else {
    header("Location: product.php?error=OrderNotSent");
    exit();
}
?>
