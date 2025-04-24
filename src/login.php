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
    <link rel="stylesheet" href="style.css"/>
    <title>Login</title>
  </head>
  <body>
    <?php
    include_once 'include/header.php';
    ?>
    <main class="main-content">
      <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-3 bovenform">Login </h2>
          <form novalidate action="include/login.inc.php" method="post" id="login-form">
            <div class="form-group form-floating">
              <input type="email" class="form-control " id="email" placeholder="Enter email" name="email" required>
              <label for="email">Email</label>
              <div class="invalid-feedback">
              Gelieve een email in te geven
            </div>
            </div>
            <div class="form-group mt-4 form-floating controlPass" >
              <input type="password" class="form-control " id="password" placeholder="Enter password" name="password" required>
              <label for="password">Password</label>
              <div class="invalid-feedback">
              Gelieve een wachtwoord in te geven
            </div>
              <i class="fa fa-eye-slash password-toggle" aria-hidden="true"></i>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5" name="submit">Aanmelden</button>
          </form>
          <div class="text-center">
            <a href="register.php">Maak Account</a>

            <?php
             if (isset($_GET['error'])) {
              if ($_GET['error'] == "wrongLogin") {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Incorrecte email of wachtwoord!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
              }
          };
            ?>
          </div>
        </div>
      </div>
    </div>
</main>
    <?php
    include_once 'include/footer.php';
  
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
