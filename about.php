<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
<link rel="stylesheet" href="style.css">
    <title>Over ons</title>
</head>
<body>
  <?php
    include_once 'include/header.php';
    ?>
    <main>
        <h1 class="about-main" >Hier wat meer informatie over ons!</h1>

      <div class="about-container">
        <div class="about-informatie">
            <p class="about-info">De firma DP-Tech is gespecialiseerd in het onderhoud en de service van verschillende machines, waaronder hoogwerkers, schaarliften, heftrucks en meer.</p>
            <p class="about-info">Met onze volledig uitgeruste servicewagen kunnen we bijna alle reparaties ter plaatse bij de klant uitvoeren.</p>
            <p class="about-info">We hebben expertise in het omgaan met mechanische en elektrische problemen, en we bieden ook op maat gemaakte oplossingen ter plaatse.</p>
            <p class="about-info">Daarnaast bieden we motorische diagnostiek met behulp van geavanceerde PC-technologie.</p>
            <p class="about-info">Naast onderhoud en reparaties bieden we ook opties voor de aankoop van nieuwe of gebruikte apparatuur.</p>
            <p class="about-info">Houd er echter rekening mee dat we geen verhuurdiensten meer aanbieden voor schaarliften, hoogwerkers, houtversnipperaars of vergelijkbare apparatuur.</p>
            <p class="about-info">DP-Tech is een gevestigd bedrijf dat al 7 jaar actief is in de sector. Met onze ervaring en toewijding hebben we een solide reputatie opgebouwd binnen de industrie.</p>
          </div>
          <div class="about-image">
            <img src="images/about-image.png" alt="">
          </div>


      </div>
    </main>
    <?php
include_once 'include/footer.php';
?>
</body>
</html>