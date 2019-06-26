<?php
session_start();
if (isset($_SESSION['username'])) {
    $productId = $_GET["id"];
    $userId = $_GET["userId"];

    if ($_SESSION['accessLevel'] == 1 || ($_SESSION['accessLevel'] == 2 && $userId == $_SESSION['id'])) {
        require_once "connect.php";

        $statement = $dbh->prepare("DELETE FROM products WHERE productId = ?");
        $statement->bindParam(1, $productId);
        $statement->execute();
        $dbh = null;
        header("location: ../index.php");
    } else {
        header("location: ../index.php");
    }
} else {
    header("location: ../index.php");
}
