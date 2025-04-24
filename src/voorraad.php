<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
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
      <div class="text-center mt-5 mb-4">
        <h2 style="color: white">Alle machines</h2>
      </div>

      <table class='voorraad-table'>
        <thead>
          <tr>
            <th>productID</th>
            <th>Soort</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Prijs</th>
            <th>Gewicht</th>
            <th>Bouwjaar</th>
            <th>Aandrijving</th>
            <th>Aankoopdag</th>
            <th>Hoeveelheid</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM machines";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr id='row-" . $row['ProductID'] . "'>";
              echo "<td>" . $row['ProductID'] . "</td>";
              echo "<td class='editable soort' contenteditable='true'>" . $row['Soort'] . "</td>";
              echo "<td class='editable merk' contenteditable='true'>" . $row['Merk'] . "</td>";
              echo "<td class='editable model' contenteditable='true'>" . $row['Model'].  "</td>";
              echo "<td class='editable prijs' contenteditable='true'>" . $row['Prijs'] ."€"."</td>";
              echo "<td class='editable gewicht' contenteditable='true'>" . $row['Gewicht'] ."KG". "</td>";
              echo "<td class='editable bouwjaar' contenteditable='true'>" . $row['Bouwjaar'] . "</td>";
              echo "<td class='editable aandrijving' contenteditable='true'>" . $row['Aandrijving'] . "</td>";
              echo "<td class='editable aankoopdag' contenteditable='true'>" . $row['Aankoopdag'] . "</td>";
              echo "<td class='editable hoeveelheid' contenteditable='true'>" . $row['Hoeveelheid'] . "</td>";
              echo '<td><img src="' . htmlspecialchars($row["img_path"], ENT_QUOTES) . '"></td>';
              echo "<td><button class='update-button' onclick='updateRow(" . $row['ProductID'] . ")'>Update</button></td>";
              echo "</tr>";
            }
            

            mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script2.js"></script>
</body>
</html>
