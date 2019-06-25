<?php
$title = "Opret bruger";
$desc = "Opret en bruger på FancyClothes.dk";
require "header.php"; ?>

<div class="createArticle container">
    <h3 class="center errorMsg">Opret ny bruger:</h3>
    <form action="" method="post">
        <div>
            <label for="formEmail">Email</label>
            <input type="email" id="formEmail" name="formEmail" placeholder="Indtast email..." required>
        </div>
        <div>
            <label for="formUsername">Brugernavn</label>
            <input type="text" id="formUsername" name="formUsername" placeholder="Indtast brugernavn..." required>
        </div>
        <div>
            <label for="formPassword">Adgangskode</label>
            <input type="password" id="formPassword" name="formPassword" placeholder="Indtast adgangskode..." required>
        </div>
        <div>
            <label for="formPassword2">Adgangskode</label>
            <input type="password" id="formPassword2" name="formPassword2" placeholder="Indtast adganskode igen..." required>
        </div>
        <div>
            <input type="submit" value="Opret" name="value">
        </div>
    </form>

    <?php
    if (isset($_POST['formUsername'])) {
        $formEmail = $_POST['formEmail'];
        $formUsername = $_POST['formUsername'];
        $formPassword = $_POST['formPassword'];
        $formPassword2 = $_POST['formPassword2'];

        require "assets/connect.php";
        $statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ?");
        $statement->bindParam(1, $formUsername);
        $statement->execute();

        $statement2 = $dbh->prepare("SELECT * FROM users WHERE dbEmail = ?");
        $statement2->bindParam(1, $formEmail);
        $statement2->execute();

        if ($row = $statement->fetch()) {
            echo "<p class='errorMsg'>Fejl - Der findes allerede en bruger med det navn!</p>";
        } elseif ($row = $statement2->fetch()) {
            echo "<p class='errorMsg'>Fejl - Der findes allerede en bruger med den email!</p>";
        } elseif ($formPassword != $formPassword2) {
            echo "<p class='errorMsg'>Fejl - passwords var ikke ens</p>";
        } else {
            $statement = $dbh->prepare("INSERT INTO users(dbUsername, dbEmail, dbPassword) VALUES(?, ?, ?)");
            $statement->bindParam(1, $formUsername);
            $statement->bindParam(1, $formEmail);
            $statement->bindParam(2, $formPassword);
            $statement->execute();
            echo "<p>Success - Bruger oprettet!</p>";
        }
    }
    ?>
</div><?php
        require "footer.php"; ?>