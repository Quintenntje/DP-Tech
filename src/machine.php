<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
  <title>Machines</title>
</head>
<body>
  <?php
  include_once 'include/header.php';
  include_once 'include/dbh_inc.php';

  $searchFields = [1 => 'Model', 2 => 'Merk', 3 => 'Soort', 4 => 'Aandrijving', 5 => 'Bouwjaar'];

  $search_term = isset($_GET['search']) ? $_GET['search'] : '';

  $query = "SELECT * FROM machines WHERE Hoeveelheid > 0 ";

  if (!empty($search_term)) {
    $query .= " WHERE ";
    $it = (new ArrayObject($searchFields))->getIterator();
    while ($it->valid()) {
      $query .= " " . $it->current() . " LIKE '%" . mysqli_real_escape_string($conn, $search_term) . "%'";
      $it->next();
      if ($it->valid()) {
        $query .= " OR ";
      }
    }
  }

  $result = mysqli_query($conn, $query);
  ?>
  <?php
  if (isset($_GET['error'])) {
      if ($_GET['error'] == "OrderSent") {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> We neemt zo snel mogelijk contact met u op.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      }
  } 
  ?>
  <h2 class="top-machine">Verkoop</h2>
  <div class="filter-input">
    <select name="" id="soort-filter" placeholder="Soort" onchange="filterMachines()">
      <option value="">-- Filter Soort --</option>
      <?php
      $soort_query = "SELECT DISTINCT Soort FROM machines";
      $soort_result = mysqli_query($conn, $soort_query);
      if (mysqli_num_rows($soort_result) > 0) {
        while ($row = mysqli_fetch_assoc($soort_result)) {
          echo '
            <option value="' . $row["Soort"] . '">' . $row["Soort"] . '</option>
          ';
        }
      }
      ?>
    </select>
    <select name="" id="merk-filter" onchange="filterMachines()">
      <option value="">-- Filter Merk --</option>
      <?php
      $merk_query = "SELECT DISTINCT Merk FROM machines";
      $merk_result =  mysqli_query($conn, $merk_query);
      if (mysqli_num_rows($merk_result) > 0) {
        while ($row = mysqli_fetch_assoc($merk_result)) {
          echo '
            <option value="' . $row["Merk"] . '">' . $row["Merk"] . '</option>
          ';
        }
      }
      ?>
    </select>
    <select name="" id="aandrijving-filter" onchange="filterMachines()">
      <option value="">-- Filter Aandrijving --</option>
      <?php
      $aandrijving_query = "SELECT DISTINCT Aandrijving FROM machines";
      $aandrijving_result =  mysqli_query($conn, $aandrijving_query);
      if (mysqli_num_rows($aandrijving_result) > 0) {
        while ($row = mysqli_fetch_assoc($aandrijving_result)) {
          echo '
            <option value="' . $row["Aandrijving"] . '">' . $row["Aandrijving"] . '</option>
          ';
        }
      }
      ?>
    </select>
  </div>
  <div class="container" id="machine-container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-12">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <form action="product.php" method="GET" onsubmit="return checkLoginStatus()">
                <input type="hidden" name="ProductID" value="' . $row["ProductID"] . '">
                <div class="col">
                  <div class="card h-100 machine-cart" onclick="submitForm(this)">
                    <img src="' . htmlspecialchars($row["img_path"], ENT_QUOTES) . '" class="card-img-top card-image" alt="...">
                    <div class="card-body machine-cart-body">
                      <h5 class="card-title machine-cart-title">' . $row["Model"] . '</h5>
                      <p class="card-text machine-cart-text">' . $row["Soort"] . ' - ' . $row["Merk"] . '<br>
                        Bouwjaar: ' . $row["Bouwjaar"] . '
                        <br>Aandrijving ' . $row["Aandrijving"] . '</p>
                    </div>
                  </div>
                </div>
              </form>
            ';
          }
        } else {
          echo '<p class="search-error">Geen machines gevonden.</p>';
        }
        ?>      
      </div>
    </div>
  </div>
</div>


  <?php
  include_once 'include/footer.php';
  ?>
</body>
<script src="script.js"></script>
<script>

  function submitForm(element) {
    element.closest('form').submit();
  }

  function filterMachines() {
    var soort = document.getElementById("soort-filter").value;
    var merk = document.getElementById("merk-filter").value;
    var aandrijving = document.getElementById("aandrijving-filter").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("machine-container").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "filter_function.php?soort=" + soort + "&merk=" + merk + "&aandrijving=" + aandrijving, true);
    xmlhttp.send();
  }

  function checkLoginStatus() {
    
    if (!<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>) {
      header("Location: register.php?error=notloggedin");
      return false;
    }

    return true;
  }
</script>
</html>
