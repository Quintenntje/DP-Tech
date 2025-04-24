<?php
session_start();

?>
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
  <link rel="icon" type="images/x-icon" href="images/favicon.ico">
  <link rel="stylesheet" href="style.css" />
    <title>Dp-Tech</title>
  </head>
  <body>
    <?php
    include_once 'include/header.php';
    include_once 'include/dbh_inc.php';

  $query = "SELECT * FROM machines ORDER BY RAND() LIMIT 8";
  $result = mysqli_query($conn, $query);
    ?>
    <!----Main---->
    <main>

    
  
      <img id="image-cycle" src="" alt="Slider Image">
    

   
    <h2 class="top-index">In de kijker</h2>

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
        }
        ?>      
      </div>
    </div>
  </div>
</div>
        <div class="index-bes">
        <h3>Heftrucks, hoogwerkers, schaarliften, wielladers landbouw-en transportmachines die u nodig heeft, die vindt u bij <h2>Dp-Tech</h2></h3>
        </div>

        <form class="index-form" action="machine.php" method="post">
        <button type="submit">Bekijk ons volledig assortiment</button>
        </form>
    </main>

    <!----Footer----->
    <?php
    include_once 'include/footer.php'
    ?>
   <script src="script.js"></script>
   <script>

    function submitForm(element) {
    element.closest('form').submit();
  }

    function checkLoginStatus() {
    
    if (!<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>) {
      header("Location: register.php?error=notloggedin");
      return false;
    }

    return true;
  }
   </script>
</body>
</html>
