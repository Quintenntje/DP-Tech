<?php
session_start();
?>
<!DOCTYPE html>
<html lang ="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css"/>
    
  </head>
  
  <body>

  <?php
 include_once "include/dbh_inc.php";
 include_once "adminpanel.php";
  ?>

<main class="content">
    <div class="container">
    <h2>Bestellingen</h2>
    </div>
    

    <?php
       $query = "SELECT * FROM bestellingen ORDER BY BestellingNummer DESC";
       $result = mysqli_query($conn, $query);
   
       
       echo "<table class='table-bestelling'>";
       echo "<thead>";
       echo "<tr>";
       echo "<th>BestellingNummer</th>";
       echo "<th>KlantNummer</th>";
       echo "<th>Naam</th>";
       echo "<th>Gemeente</th>";
       echo "<th>Adres</th>";
       echo "<th>ProductID</th>";
       echo "<th>Merk</th>";
       echo "<th>Model</th>";
       echo "<th>Prijs</th>";
       echo "<th>Hoeveelheid</th>";
       echo "<th>Aankoopdag</th>";
       echo "</tr>";
       echo "</thead>";
       echo "<tbody>";
   
       while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr>";
           echo "<td>" . $row['BestellingNummer'] . "</td>";
           echo "<td>" . $row['KlantNummer'] . "</td>";
           echo "<td>" . $row['Naam'] . "</td>";
           echo "<td>" . $row['Gemeente'] . "</td>";
           echo "<td>" . $row['Adres'] . "</td>";
           echo "<td>" . $row['ProductID'] . "</td>";
           echo "<td>" . $row['Merk'] . "</td>";
           echo "<td>" . $row['Model'] . "</td>";
           echo '<td>€' . $row['Prijs'] . '</td>';

           echo "<td>" . $row['Hoeveelheid'] . "</td>";
           echo "<td>" . $row['Aankoopdag'] . "</td>";
           echo "</tr>";
       }
   
       echo "</tbody>";
       echo "</table>";
   
       
       mysqli_close($conn);
     ?>
     </div>
  </main>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
<script src="script2.js"></script>
</html>