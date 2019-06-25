<?php
$title = "Login";
$desc = 'Velkommen til FancyClothes.dk loginside';
if (isset($_POST['formUsername'])) {
    $formUsername = $_POST['formUsername'];
    $formPassword = $_POST['formPassword'];
    $url = $_GET["url"];
    if ($url === "login.php") {
        $url = "index.php";
    }

    require_once 'assets/connect.php';

    $statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ? && dbPassword = ?");
    $statement->bindParam(1, $formUsername);
    $statement->bindParam(2, $formPassword);
    $statement->execute();

    if (empty($row = $statement->fetch())) {
        //Forkert login
        $dbh = null;

        require "header.php"; ?>
        <div class="container">
            <h2 class='errorMsg'>Forkert login</h2>
        </div>
        <?php
        require "footer.php";
    } else {
        //Korrekt login
        session_start();
        $_SESSION['username'] = $row['dbUsername'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        $_SESSION['id'] = $row['userId'];
        $dbh = null;
        header("location: $url");
    }
} else {
    header("location: /index.php");
}
