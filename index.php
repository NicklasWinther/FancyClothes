<?php
$title = "Forside";
$desc = 'Velkommen til FancyClothes.dk';

require "header.php";
// Hvis man er logget ind, indsæt form til at oprette nye produkter
if (isset($_SESSION['username'])) { ?>
    <div class="createArticle container">
        <h3 class="center errorMsg">Opret ny vare:</h3>
        <form action="assets/insertArticle.php" method="post">
            <div>
                <label for="imgUrl">Billede</label>
                <input type="text" id="imgUrl" name="imgUrl" placeholder="Vælg billede" required>
            </div>
            <div>
                <label for="imgAlt">Alt tekst</label>
                <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
            </div>
            <div>
                <label for="title">Overskrift</label>
                <input type="text" id="title" name="title" placeholder="Overskrift..." required>
            </div>
            <div>
                <label for="price">Pris</label>
                <input type="text" id="price" name="price" placeholder="Pris..." required>
            </div>
            <div>
                <label for="text">Brødtekst</label>
                <textarea name="text" id="text" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
            </div>
            <div>
                <label for="stars">Antal stjerner</label>
                <select name="stars" id="stars">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="categoryId">Kategori</label>
                <select name="categoryId" id="categoryId" required>
                    <!-- Få fat i alle kategorierne, og indsæt dem i en <option> -->
                    <?php require "assets/getFormCategories.php" ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Opret" name="value">
            </div>
        </form>
    <?php } ?>
</div>
</div>
<main class="container">
    <aside>
        <div class="categories">
            <div class="catTop">
                <h4>Kategorier:</h4>
            </div>
            <div class="catMain">
                <ul>
                    <!-- Få fat i alle kategorierne, og indsæt dem i en <ul> -->
                    <?php require "assets/getCategoryLinks.php" ?>
                </ul>
            </div>
        </div>

        <div class="newsletter">
            <div class="newsTop">
                <h4>Tilmeld nyhedsbrev</h4>
            </div>
            <div class="newsMain">
                <form action="">
                    <input type="text" placeholder="Navn">
                    <input type="email" placeholder="Email">
            </div>
            <div class="newsBottom">
                <input type="submit" value="Tilmeld">
                </form>
            </div>
        </div>
    </aside>
    <div class="products">
        <h3>INSPIRATION</h3>
        <hr>
        <div class="inspiration">
            <div class="catMen">
                <img src="img/kategoriHerre.jpg" alt="">
                <h5>Herretøj</h5>
                <div class="action">Lær mere</div>
            </div>
            <div class="catWomen">
                <img src="img/kategoriKvinde.jpg" alt="">
                <h5>Kvindetøj</h5>
                <div class="action">Lær mere</div>
            </div>
        </div>
        <div class="frontProducts">
            <!-- Hent alle produkter, og indsæt dem i en <article> -->
            <?php require "assets/getArticles.php" ?>
        </div>
    </div>
</main>
<?php require "footer.php" ?>