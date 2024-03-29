<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?> | FancyClothes.dk</title>
    <meta name="description" content="<?php echo $desc ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="img/homeIcon.png">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <!-- Velkomstbesked -->
        <h2>
            <?php if (isset($_SESSION['username'])) {
                echo "Velkommen: " . $_SESSION['username'];
            } ?>
        </h2>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <!-- Tilføj klassen active til den li der svarer til den sides titel -->
                <li <?php echo $title == "Forside" ? "class='active'" : "" ?>><a href="index.php">Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li <?php echo $title == "Om os" ? "class='active'" : "" ?>><a href="about.php">Om os</a></li>
                <?php if (isset($_SESSION['username'])) { ?>
                    <!-- Hvis brugeren er logget ind, vis kun log ud knap, ellers vis "login" og "opret bruger" knap -->
                    <li><a href='assets/logout.php?url=<?php echo basename($_SERVER['PHP_SELF']) ?>'>Log ud</a></li> <!-- Bruger $_SERVER['PHP_SELF'] til at få sidens url, og derefter basename() til kun at få fat i sidens navn fx. index.php-->
                <?php } else { ?>
                    <li <?php echo $title == "Login" ? "class='active'" : "" ?>><a href='#' class='loginBtn'>Log ind</a></li>
                    <li <?php echo $title == "Opret bruger" ? "class='active'" : "" ?>><a href='register.php' class='loginBtn'>Opret bruger</a></li>

                <?php } ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <!-- Fjern også formularen hvis man er logget ind -->
    <?php if (!isset($_SESSION['username'])) { ?>
        <div class="login container">
            <form action="login.php?url=<?php echo basename($_SERVER['PHP_SELF']) ?>" method="post">
                <label for="formUsername">Bruger:</label>
                <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
                <label for="formPassword">Password:</label>
                <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>
                <input type="submit" value="Log ind">
            </form>
            <a id="newUser" href="register.php">Ny bruger?</a>
        </div>
    <?php } ?>

    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/2-par-sko.jpg" alt="2 par sko"></li>
            <li><img src="img/udstillingssko.jpg" alt="Sko til udstilling"></li>
            <li><img src="img/tøj-på-knager.jpg" alt="Tøj på knager"></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>