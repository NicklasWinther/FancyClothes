<?php
require_once "connect.php";

$statement = $dbh->prepare("SELECT * FROM categories");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>

    <li><a href="index.php?categoryId=<?php echo $row['categoryId'] ?>"><?php echo $row['category'] ?></a></li>
<?php };
