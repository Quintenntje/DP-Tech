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
  <link rel="stylesheet" href="style2.css" />
    <title>AddAdmin</title>
</head>
<body>
   
  <?php
 include_once "include/dbh_inc.php";
 include_once "adminpanel.php";

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nonadmin'])) {
        $selectedklant = $_POST['nonadmin'];

        $updateQuery = "UPDATE inlogklant SET isAdmin = 1 WHERE KlantNummer = '$selectedklant'";
        mysqli_query($conn, $updateQuery);

    }
}
?>

<main class="content">
<?php
 $query = "SELECT * FROM inlogklant WHERE isAdmin = 0";
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0){
    echo '<form method="POST">';
    echo '<select name="nonadmin" id="nonadmin">';
    echo '<option value="">Kies admin</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['KlantNummer'].'">'.$row['Email'].'</option>';
    }

    echo '</select>';
    echo '<button type="submit" class="admin">Change to Admin</button>';
    echo '</form>';
 }

 mysqli_close($conn);
?>
</main>

<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
<script src="script2.js"></script>
</body>
</html>
