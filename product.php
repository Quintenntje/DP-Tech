<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: register.php?error=notloggedin");
    exit();
}
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (!isset($_GET['ProductID'])) {
    header('Location: machine.php');
    exit();
}

include 'include/dbh_inc.php';

    $query = "SELECT Naam FROM inlogklant WHERE Email = '" . mysqli_real_escape_string($conn, $email) . "'";
    $nameResult = mysqli_query($conn, $query);
    $name = "";
    if (mysqli_num_rows($nameResult) === 1) {
        $nameRow = mysqli_fetch_assoc($nameResult);
        $name = $nameRow['Naam'];
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Product</title>
</head>

<body>

    <?php
    include 'include/header.php';
    

    if (!isset($_GET['ProductID'])) {

        header('Location: machine.php');
        exit();
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "OrderNotSent") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Incorrecte email of wachtwoord!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    };
    $ProductID = $_GET['ProductID'];
    $query = "SELECT * FROM machines WHERE ProductID = " . mysqli_real_escape_string($conn, $ProductID);
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $merk = $row['Merk'];
        $model = $row['Model'];
        $prijs = $row['Prijs'];
        
        
        echo '

        <div class="product-container">
            <div class="product-image">
            <h2>' . $row["Merk"] ." ". $row["Model"].'</h2>
                <img src="' . htmlspecialchars($row["img_path"], ENT_QUOTES) . '" alt="Product Image">
            </div>
            <div class="product-form">
                <form action="addbestellingen_function.php" method="POST">
                    <input type="hidden" name="machine_id" value="' . $row["ProductID"] . '">
                    <div class="product-input">
                        <label for="name">Naam:</label>
                        <input type="text" id="name" name="name" value="'.htmlspecialchars($name, ENT_QUOTES) .'" required>
                    </div>
                    <div class="product-input">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="'. htmlspecialchars($email, ENT_QUOTES) .'" required>
                    </div>
                    <div class="product-input">
                        <label for="adres">Adres:</label>
                        <input type="text" id="adres" name="adres" required>
                    </div>
                    <div class="product-input">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" required>
                    </div>
                    <div class="product-input">
                        <label for="Gemeente">Gemeente:</label>
                        <input type="text" id="gemeente" name="gemeente" required>
                    </div>
                    <div class="product-input">
                        <button type="submit"> Verstuur bestelling</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="product-descr">
    <h2 class="product-info">Product Informatie</h2>
        <p class="product-price">€' . $row["Prijs"] . '</p>
        <p class="product-soort">Soort: ' . $row["Soort"] . '</p>
        <p class="product-merk">Merk: ' . $row["Merk"] . '</p>
        <p class="product-model">Model: ' . $row["Model"] . '</p>
        <p class="product-Gewicht">Gewicht: ' . $row["Gewicht"] . "KG".'</p>
        <p class="product-Aandrijving">Aandrijving: ' . $row["Aandrijving"] . '</p>
        <p class="product-Bouwjaar">Bouwjaar: ' . $row["Bouwjaar"] . '</p>
        
        
    </div>
    ';
    } else {
        header('Location: machine.php');
        exit();
    }

    include 'include/footer.php';
    ?>
    
</body>

</html>
