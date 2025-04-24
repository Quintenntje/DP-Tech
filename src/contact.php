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
    <link rel="stylesheet" href="style.css" />
    <title>Contact</title>
  </head>
  <body>
    <?php
    include_once 'include/header.php';
    ?>
<main class="contact-main">
  <h2>Heb je vragen?</h2>
  <h3>Neem dan contact op met ons!</h3>
  <div class="form-wrapper">
  <form class="contact-form" action="mailto:DP-Tech@outlook.com" method="POST" enctype="text/plain">
    <input type="text" class="feedback-input" placeholder="Naam" required />
    <input type="text" class="feedback-input" placeholder="Email" required />
    <textarea name="text" class="feedback-input" placeholder="Schrijf hier uw vraag" required></textarea>
    <button class="contact-button" type="submit">Versturen</button>
  </form>
  <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1054.6228209307956!2d3.93704977603119!3d51.04699558995471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c39bf5efd410fb%3A0xec6fb26468ac6251!2sGoudberg%2016%2C%209290%20Berlare!5e0!3m2!1snl!2sbe!4v1676408400814!5m2!1snl!2sbe" width="360px" height="345px"></iframe></div>
</div>
</main>

<?php include_once 'include/footer.php'; ?>

  </body>
</html>
