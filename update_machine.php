<?php
include_once "include/dbh_inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $data = json_decode(file_get_contents("php://input"), true);

  $id = $data['id'];
  $soort = $data['soort'];
  $merk = $data['merk'];
  $model = $data['model'];
  $prijs = $data['prijs'];
  $gewicht = $data['gewicht'];
  $bouwjaar = $data['bouwjaar'];
  $aandrijving = $data['aandrijving'];
  $aankoopdag = $data['aankoopdag'];
  $hoeveelheid = $data['hoeveelheid'];

  $query = "UPDATE machines SET Soort='$soort', Merk='$merk', Model='$model', Prijs='$prijs', Gewicht='$gewicht', Bouwjaar='$bouwjaar', Aandrijving='$aandrijving', Aankoopdag='$aankoopdag', Hoeveelheid='$hoeveelheid' WHERE ProductID='$id'";

  if (mysqli_query($conn, $query)) {
    echo "Successfully updated.";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
