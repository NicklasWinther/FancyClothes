<?php
require_once "connect.php";
$statement = $dbh->prepare("SELECT * FROM products JOIN users ON products.userId = users.userId");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
    <article>
        <img src="img/<?php echo $row['imgUrl'] ?>" alt="<?php echo $row['imgAlt'] ?>">
        <div class="info">
            <h3><?php echo $row['title'] ?></h3>
            <div class="stars">
                <?php for ($i = 1; $i <= 5; $i++) {
                    echo ($i <= $row['stars']) ? "<i class='fa fa-star' aria-hidden='true'></i>" : "<i class='fa fa-star-o' aria-hidden='true'></i>";
                    // Hvis i er lavere end eller lige med stars, indsæt en gul stjerne
                } ?>
            </div>
        </div>
        <div class="description">
            <div class="published">
                Oprettet:
                <?php
                setlocale(LC_TIME, 'danish');
                echo strftime("%A, d. %e/%m-%Y", $row['date']) . " af " . $row['dbUsername'] ?>

            </div>
            <p><?php echo $row['text'] ?>
                <a href="#">Læs mere...</a></p>
            <!-- Mulighed for sletning herunder -->
            <?php
            if (isset($_SESSION['accessLevel'])) {
                if ($_SESSION['accessLevel'] == 1 || ($_SESSION['accessLevel'] == 2 && $row['userId'] == $_SESSION['id'])) {
                    echo "<a class='deleteMe' title='DELETE' href='assets/deleteArticle.php?id=" . $row['productId'] . "'>&#10006</a>";
                }
            } ?>
        </div>
    </article>
    <?php
    $pdh = null;
}
?>