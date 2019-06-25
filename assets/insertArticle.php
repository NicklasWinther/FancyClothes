<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $text = $_POST['text'];
    $categoryId = $_POST['categoryId'];
    $imgUrl = $_POST['imgUrl'];
    $imgAlt = $_POST['imgAlt'];
    $price = $_POST['price'];
    $stars = $_POST['stars'];
    $date = time();

    session_start();
    $userId = $_SESSION['id'];
    require_once "connect.php";

    $statement = $dbh->prepare("INSERT INTO products (title, imgUrl, imgAlt, date, text, userId, stars, categoryId, price)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bindParam(1, $title);
    $statement->bindParam(2, $imgUrl);
    $statement->bindParam(3, $imgAlt);
    $statement->bindParam(4, $date);
    $statement->bindParam(5, $text);
    $statement->bindParam(6, $userId);
    $statement->bindParam(7, $stars);
    $statement->bindParam(8, $categoryId);
    $statement->bindParam(9, $price);
    $statement->execute();

    header("location: ../index.php");
} else {
    header("location: ../index.php");
}
