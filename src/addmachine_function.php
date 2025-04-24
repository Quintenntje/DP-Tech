<?php
include_once('./include/dbh_inc.php');
$serverName="mysql";
$DBUsername ="root";
$DBPassword ="root";
$DBName="dp-tech";

$conn = mysqli_connect($serverName, $DBUsername, $DBPassword, $DBName);


$soort = $_POST['Soort'];
$merk = $_POST['Merk'];
$model = $_POST['Model'];
$prijs = $_POST['Prijs'];
$gewicht = $_POST['Gewicht'];
$bouwjaar = $_POST['Bouwjaar'];
$aandrijving = $_POST['Aandrijving'];
$aankoopdag = $_POST['Aankoopdag'];
$hoeveelheid = $_POST['Hoeveelheid'];


$valid_types = array('image/jpeg', 'image/png', 'image/jpg');
$file_type = $_FILES['machine-image']['type'];
if (!in_array($file_type, $valid_types)) {
  header('Location: ../Main gip/addmachine.php?error=invalid-file');
  exit();
}

$file_name = $_FILES['machine-image']['name'];
$temp_name = $_FILES['machine-image']['tmp_name'];
$directory = 'images/Machines/';
$file_path = $directory . $file_name;
move_uploaded_file($temp_name, $file_path);


$sql = "INSERT INTO machines (Soort, Merk, Model, Prijs, Gewicht, Bouwjaar, Aandrijving, Aankoopdag, Hoeveelheid, img_path)
          VALUES ('$soort', '$merk', '$model', '$prijs', '$gewicht', '$bouwjaar', '$aandrijving', '$aankoopdag', '$hoeveelheid', '$file_path')";
$result = mysqli_query($conn, $sql);

header('Location: ../Main Gip/addmachine.php');
exit();
?>
