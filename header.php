<!-- de inhoud van dit bestand wordt bovenaan elke pagina geplaatst -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NerdyGadgets</title>

    <meta name="viewport" content="width=device-width">

    <!-- Javascript -->

    <!-- Style sheets-->
    <link rel="stylesheet" href="Public/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/typekit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="Background">
    <div class="row" id="Header">
        <div class="col-2"><a href="./" id="LogoA">
                <div id="LogoImage"></div>
            </a></div>
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
                    <a href="categorieen" class="HrefDecoration">Alle categorieën</a>
                </li>
            </ul>
        </div>
<!-- code voor US3: zoeken -->
        <ul id="ul-class-navigation">

            <a>
                <a <i class="fa fa-beoordeling" aria-hidden="true"></i>Klanten beoordelen ons met een <?php echo $rating ?>/5</a>
            </li>

            <li>
                <a href="verlanglijstje" class="HrefDecoration"><i class="fa fa-heart wishlist" aria-hidden="true"></i></a>
            </li>
            <li>
                <a href="winkelmandje" class="HrefDecoration"><i class="fa fa-shopping-cart cart" aria-hidden="true"></i>  Winkelwagen <?php if(count($cart) != 0) print("[".count($cart)."]")?></a>
            </li>

            <?php if(!empty($_SESSION)){
                ?>
            <li>
                <a href='account' class='HrefDecoration'><i class='fa fa-user account' aria-hidden='true'></i> Account</a>
            </li>
            <?php } if(!empty($_SESSION['email'])){
                echo "<li>
                <a href='Log-Uit.php' class='HrefDecoration'><i class='fa fa-user account' aria-hidden='true'></i> Log-Uit</a>
            </li>";
            } else {
                echo "<li>
                <a href='login' class='HrefDecoration'><i class='fa fa-user account' aria-hidden='true'></i> Log-In</a>
            </li>";
            } ?>
            <li>
                <a href="bladeren" class="HrefDecoration"><i class="fas fa-search search"></i> Zoeken</a>
            </li>
        </ul>

<!-- einde code voor US3 zoeken -->
    </div>
    <div class="row" id="Content">
        <div class="col-12">
            <div id="SubContent">