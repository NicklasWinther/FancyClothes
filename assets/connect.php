<?php
$serverName = "localhost";
$dbName = "fancyclothes";
$username = "root";
$password = "";

try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbName; charset=utf8", $username, $password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Hov... noget gik galt: " . $e->getMessage();
}
