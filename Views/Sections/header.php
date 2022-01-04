<?php
$sql = "SELECT rating, aantal FROM rating";

$Statement = mysqli_prepare($databaseConnection, $sql);
mysqli_stmt_execute($Statement);
$ReturnableResult = mysqli_stmt_get_result($Statement);
$record = mysqli_fetch_assoc($ReturnableResult);
$aantal = $record['aantal'];
$rating = round($record['rating'] / $aantal, 1);
?>
<!-- de inhoud van dit bestand wordt bovenaan elke pagina geplaatst -->

<div class="Background">
    <div class="row" id="Header">
        <div class="col-2">
            <a href="/nerdygadgets" id="Logo" aria-label="NerdyGadgets logo">
                <div id="LogoImage"></div>
            </a>
        </div>
        <div class="col-8" id="CategoriesBar">
            <ul id="ul-class">
                <?php
                $HeaderStockGroups = getHeaderStockGroups($databaseConnection);

                foreach ($HeaderStockGroups as $HeaderStockGroup) {
                    ?>
                    <li>
                        <a href="bladeren?category_id=<?php print $HeaderStockGroup['StockGroupID']; ?>"
                           class="HrefDecoration"><?php print $HeaderStockGroup['StockGroupName']; ?></a>
                    </li>
                    <?php
                }
                ?>

                <li>
                    <a href="categorieen" class="HrefDecoration">Categorieën</a>
                </li>
            </ul>
        </div>
<!-- code voor US3: zoeken -->
        <ul id="ul-class-navigation">
            <li>
                <p class="fa beoordeling">Klanten beoordelen ons met <?php echo $rating ?>/5!</p>
            </li>

            <li>
                <a href="verlanglijstje" class="HrefDecoration"><i class="fa fa-heart wishlist" aria-hidden="true"></i> Verlanglijstje</a>
            </li>
            <li>
                <a href="winkelmandje" class="HrefDecoration"><i class="fa fa-shopping-cart cart" aria-hidden="true"></i> Winkelwagen <?php if(count($cart) != 0) print("[".count($cart)."]")?></a>
            </li>

            <?php if(!empty($_SESSION)){
                ?>
            <li>
                <a href='account' class='HrefDecoration'><i class='fa fa-user account' aria-hidden='true'></i> Account</a>
            </li>
            <?php } if(!empty($_SESSION['email'])){
                echo "<li>
                <a href='log-uit' class='HrefDecoration'><i class='fa fa-user account' aria-hidden='true'></i> Log-Uit</a>
            </li>";
            } else {
                echo "<li>
                <a href='login' class='HrefDecoration'><i class='fa fa-user account' aria-hidden='true'></i> Log-In</a>
            </li>";
            } ?>
        </ul>

<!-- einde code voor US3 zoeken -->
    </div>
    <div class="row" id="Content">
        <div class="col-12">
            <div id="SubContent">