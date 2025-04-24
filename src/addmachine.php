<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
    crossorigin="anonymous"
  />
    <link rel="stylesheet" href="style2.css">
    <title>Machines toevoegen</title>
</head>
<body>
  <?php
  
include_once "include/dbh_inc.php";
include_once "adminpanel.php";
  ?>
  <main class="content">
<h2>Machines toevoegen</h2>
<div class="input-container">
  <form action="addmachine_function.php" method="post" enctype="multipart/form-data">
    <div class="form-row">
      <input type="text" name="Soort" placeholder="Soort" required>
      <input type="text" name="Merk" placeholder="Merk" required>
      <input type="text" name="Model" placeholder="Model" required>
    </div>
    <div class="form-row">
      <input type="text" name="Prijs" placeholder="Prijs" required>
      <input type="text" name="Gewicht" placeholder="Gewicht" required>
      <input type="text" name="Bouwjaar" id="" placeholder="Bouwjaar" required>
    </div>
    <input type="text" name="Aandrijving" placeholder="Aandrijving" required>
    <input type="date" name="Aankoopdag"  placeholder="Aankoopdag" required >
    <input type="text" name="Hoeveelheid" placeholder="Hoeveelheid" required>
    <div class="form-row">
      <label for="machine-image"><i class="fas fa-cloud-upload-alt"></i> Selecteer afbeelding</label>
      <input type="file" id="machine-image" name="machine-image" onchange="showSelectedFile()">
    <span id="selected-file-name"></span>
    </div>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'invalid-file') {
      echo '<div class="alert alert-danger" role="alert">Ongeldig bestandstype. Alleen JPEG, PNG en JPG bestanden zijn toegestaan.</div>';
      }
?>
    <button type="submit">Voeg machine toe</button>
  </form>
</div>
    <?php

$query = "SELECT * FROM machines ";
$result = mysqli_query($conn, $query);
if (isset($_POST['delete_button'])) {
    $id = $_POST['row_id'];
    $sql = "DELETE FROM machines WHERE ProductID=$id";
    if ($conn->query($sql) === TRUE) {
      echo "Row deleted successfully";
    } else {
      echo "Error deleting row: " . $conn->error;
    }
}
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <div class="col">
                <div class="card h-100 machine-cart">
                <img src="' . htmlspecialchars($row["img_path"]) . '" class="card-img-top card-image" alt="...">
                  <div class="card-body machine-cart-body">
                    <h5 class="card-title machine-cart-title">' . $row["Model"] . '</h5>
                    <p class="card-text machine-cart-text">' . $row["Soort"] . ' - ' . $row["Merk"] . '<br>
                    Bouwjaar: ' . $row["Bouwjaar"] . '
                    <br>Aandrijving '.$row["Aandrijving"].'  </p>
                    <br>
                    <form method="post">
                    <input type="hidden" name="row_id" value="' . $row["ProductID"] . '">
                    <button type="submit" name="delete_button" class="btn btn-danger" onclick="zeker()">X</button>
                    </form>
                  </div>
                </div>
              </div>'
              ;
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
<script src="script2.js"></script>
</html>
