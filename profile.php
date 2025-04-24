<?php
session_start();
$email = $_SESSION['email'];
include_once '/include/password_compat-master/lib/password.php';
include_once 'include/dbh_inc.php';

if (isset($_POST['submit'])) {
    $oldPassword = $_POST['oldpass'];
    $newPassword = $_POST['newpass'];
    $newPasswordRepeat = $_POST['newpassrepeat'];

  
    $query = "SELECT Wachtwoord FROM inlogklant WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['Wachtwoord'];

        
        if (password_verify($oldPassword, $storedPassword)) {
          
            if ($newPassword === $newPasswordRepeat) {
                
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE inlogklant SET Wachtwoord = '$hashedPassword' WHERE Email = '$email'";
                mysqli_query($conn, $updateQuery);
                header("Location: profile.php?success=passwordChanged");
                exit();
            } else {
              header("Location: profile.php?error=passwordsDontMatch");
            }
        } else {
          header("Location: profile.php?error=wrongOldPassword");
        }
    }
}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />
    <link rel="icon" type="images/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css" />
    <title>Profile</title>
  </head>
  <body>
    <?php
    include_once 'include/header.php';
    ?>
    <main class="profile-main">
      <div class="profile-container">
        <h2 class="top-profile">Mijn bestellingen</h2>
        <div class="table-responsive">
          <?php
          $query = "SELECT * FROM bestellingen WHERE Email = '$email'";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            echo '<table class="profile-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>BestellingNummer</th>';
            echo '<th>Naam</th>';
            echo '<th>Machine</th>';
            echo '<th>Prijs</th>';
            echo '<th>Adres</th>';
            echo '<th>Postcode</th>';
            echo '<th>Gemeente</th>';
            echo '<th>Aankoopdag</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>';
              echo '<td>' . $row['BestellingNummer'] . '</td>';
              echo '<td>' . $row['Naam'] . '</td>';
              echo '<td>' . $row['Merk'] . ' ' . $row['Model'] . '</td>';
              echo '<td>€' . $row['Prijs'] . '</td>';
              echo '<td>' . $row['Adres'] . '</td>';
              echo '<td>' . $row['Postcode'] . '</td>';
              echo '<td>' . $row['Gemeente'] . '</td>';
              echo '<td>' . $row['Aankoopdag'] . '</td>';
              echo '<td><a href="?cancel=' . $row['BestellingNummer'] . '">Annuleer</a></td>';
              echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
          } else {
            echo '<p>U heeft nog geen machine besteld</p>';
          }

          if (isset($_GET['cancel'])) {
            $bestellingNummer = $_GET['cancel'];

            $query = "DELETE FROM bestellingen WHERE BestellingNummer = '$bestellingNummer'";
            mysqli_query($conn, $query);
          }
          ?>
        </div>
      </div>
      <div class="pass-change">
        <h2 class="top-profile">Wachtwoord veranderen</h2>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "passwordsDontMatch") {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Wachtwoorden komen niet overeen.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
          }
      }
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "wrongOldPassword") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Oud wachtwoord is fout.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
  
    if (isset($_GET['success'])) {
      if ($_GET['success'] == "passwordChanged") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Wachtwoord veranderd
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
      }
    }
 
    
        ?>
        <form class="changepassform" action="profile.php" method="post">
          <input type="password" name="oldpass" placeholder="Oud wachtwoord" required>
          <input type="password" name="newpass" placeholder="Nieuw wachtwoord" required>
          <input type="password" name="newpassrepeat" placeholder="Herhaal nieuw wachtwoord" required>
          <br>
          <button type="submit" name="submit">Verander wachtwoord</button>
        </form>
      </div>
    </main>
    <?php
    include_once 'include/footer.php';
    mysqli_close($conn);
    ?>
  </body>
</html>
