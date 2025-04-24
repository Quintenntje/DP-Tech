<?php
session_start();
include_once 'include/dbh_inc.php';


$soort = isset($_GET['soort']) ? mysqli_real_escape_string($conn, $_GET['soort']) : '';
$merk = isset($_GET['merk']) ? mysqli_real_escape_string($conn, $_GET['merk']) : '';
$aandrijving = isset($_GET['aandrijving']) ? mysqli_real_escape_string($conn, $_GET['aandrijving']) : '';

$query = "SELECT * FROM machines ";

if (!empty($soort) || !empty($merk) || !empty($aandrijving)) {
  $query .= " WHERE ";
  $filters = array();
  if (!empty($soort)) {
    $filters[] = "Soort = '$soort'";
  }
  if (!empty($merk)) {
    $filters[] = "Merk = '$merk'";
  }
  if (!empty($aandrijving)) {
    $filters[] = "Aandrijving = '$aandrijving'";
  }
  $query .= implode(' AND ', $filters);
}


$result = mysqli_query($conn, $query);
?>

<div class="container" id="machine-container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-12">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
        <?php
        $output = '';
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <div class="col">
                <div class="card h-100 machine-cart">
                <img src="' . htmlspecialchars($row["img_path"], ENT_QUOTES) . '" class="card-img-top card-image" alt="...">
                  <div class="card-body machine-cart-body">
                    <h5 class="card-title machine-cart-title">' . $row["Model"] . '</h5>
                    <p class="card-text machine-cart-text">' . $row["Soort"] . ' - ' . $row["Merk"] . '<br>
                    Bouwjaar: ' . $row["Bouwjaar"] . '
                    <br>Aandrijving '.$row["Aandrijving"].'  </p>
                  </div>
                </div>
              </div>
            ';
          }
        } else {
          $output = '<p class="search-error">Geen resultaten gevonden.</p>';
        }        
        ?>
      </div>
    </div>
  </div>
</div>
<?php
echo $output;

mysqli_close($conn);
?>
