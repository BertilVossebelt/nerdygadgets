<!-- dit bestand bevat alle code voor de pagina die één product laat zien -->
<?php
$StockItem = getStockItem($_GET['id'], $databaseConnection);

// General stock item data
$StockItemID = $StockItem["StockItemID"];
$StockItemPrice = $StockItem["SellPrice"];
$StockItemName = $StockItem["StockItemName"];
$ItemName = htmlspecialchars($StockItemName, ENT_QUOTES);

// Stock item images
$StockItemImage = getStockItemImage($_GET['id'], $databaseConnection);

$StockItemPath = $StockItemImage[0]["ImagePath"] ?? $StockItem['BackupImagePath'];

$StockItemID = $StockItem["StockItemID"];
$StockItemPrice = $StockItem["SellPrice"];
$StockItemName = $StockItem["StockItemName"];
$ItemName = htmlspecialchars($StockItemName, ENT_QUOTES);
$Voorraad = str_replace("Voorraad: ", "", $StockItem["QuantityOnHand"]);
$Voorraad = intval($Voorraad);

if($Voorraad < 10){
    ?>
    <script>
function myFunction()
{
    alert('Let op, er zijn nog maar ' + <?php print($Voorraad); ?> + ' van dit product op voorraad.');
}
myFunction()
</script>
<?php
}
?>

<li id="CenteredContent">
    <?php
    if ($StockItem != null) {
    ?>
    <?php
    if (isset($StockItem['Video'])) {
        ?>
        <div id="VideoFrame">
            <?php print $StockItem['Video']; ?>
        </div>
    <?php }
    ?>

    <div id="ArticleHeader">
        <?php
        if (isset($StockItemImage)) {
            // één plaatje laten zien
            ?>
            <?php
            if (count($StockItemImage) >= 2) { ?>
                <!-- meerdere plaatjes laten zien -->
                <div id="ImageFrame">
                    <div id="ImageCarousel" class="carousel slide" data-interval="false">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <?php for ($i = 0; $i < count($StockItemImage); $i++) {
                                ?>
                                <li data-target="#ImageCarousel"
                                    data-slide-to="<?php print $i ?>" <?php print (($i == 0) ? 'class="active"' : ''); ?>></li>
                                <?php
                            } ?>
                        </ul>

                        <!-- slideshow -->
                        <div class="carousel-inner">
                            <?php for ($i = 0; $i < count($StockItemImage); $i++) {
                                ?>
                                <div class="carousel-item <?php print ($i == 0) ? 'active' : ''; ?>">
                                    <img src="Public/StockItemIMG/<?php print $StockItemImage[$i]['ImagePath'] ?>">
                                </div>
                            <?php } ?>
                        </div>

                        <!-- knoppen 'vorige' en 'volgende' -->
                        <a class="carousel-control-prev" href="#ImageCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#ImageCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div id="ImageFrame"
                     style="background-image: url(<?php isset($StockItemImage[0]["ImagePath"]) ? print("'Public/StockItemIMG/$StockItemPath'") : print("'Public/StockGroupIMG/$StockItemPath'"); ?>); background-size: 300px; background-repeat: no-repeat; background-position: center;"></div>
                <?php
            }
        } else {
            ?>
            <div id="ImageFrame"
                 style="background-image: url('Public/StockGroupIMG/<?php print $StockItem['BackupImagePath']; ?>'); background-size: cover;"></div>
            <?php
        }
        ?>


        <h1 class="StockItemID">Artikelnummer: <?php print $StockItem["StockItemID"]; ?></h1>
        <h2 class="StockItemNameViewSize StockItemName">
            <?php print $StockItem['StockItemName']; ?>
        </h2>
        <div class="wishlistAlign">
            <div class="wishlistAlignChild">
                <div>
                    <form method="get" action="Interstitial/redirectToWishlist.php">
                        <input type="number" name="stockItemID" value="<?php print($StockItemID) ?>" hidden/>
                        <input type="number" name="SellPrice" value="<?php print($StockItemPrice) ?>" hidden/>
                        <input type="text" name="StockItemName" value="<?php print($ItemName) ?>" hidden/>
                        <input type="text" name="StockItemPath" value="<?php print($StockItemPath) ?>" hidden/>
                        <button type="submit" name="wishlist" class="wishlist-button"><i class="fa fa-heart" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <form method="get" action="Interstitial/redirect.php">
                <input type="number" name="stockItemID" value="<?php print($StockItemID) ?>" hidden>
                <input type="number" name="SellPrice" value="<?php print($StockItemPrice) ?>" hidden>
                <input type="text" name="StockItemName" value="<?php print($ItemName) ?>" hidden>
                <input type="text" name="StockItemPath" value="<?php print($StockItemPath) ?>" hidden>
                <input type="submit" name="submit" value="Voeg toe aan winkelmandje"
                       class="pr-shop-button">
            </form>
        </div>
        <div id="StockItemDescription" class="box-shadow" style="background-color: #6DAFFE; border-radius: 10px; border-width: 0px">
            <h3>Artikel beschrijving</h3>
            <p><?php print $StockItem['SearchDetails']; ?></p>
        </div>
        <div class="QuantityText"><p><?php print $StockItem['QuantityOnHand'];?>

                <?php if($StockItemID == 220 || $StockItemID == 222 || $StockItemID == 223 || $StockItemID == 224 || $StockItemID == 225 || $StockItemID == 226 || $StockItemID == 227){ ?></p>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <p id= temperature ><script src="temperatures.js"></script></p>
            <?php } ?>
        </div>
        <div id="StockItemHeaderLeft">
            <div class="CenterPriceLeft">
                <div class="CenterPriceLeftChild">
                    <p class="StockItemPriceText"><b><?php print sprintf("€ %.2f", $StockItem["SellPrice"]); ?></b>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="StockItemSpecifications" class="box-shadow" style="background-color: #6DAFFE; border-radius: 10px; border-width:0px">
        <h3>Artikel specificaties</h3>

        <?php
        $CustomFields = json_decode($StockItem['CustomFields'], true);
        if (is_array($CustomFields)) { ?>
            <table>
            <thead>
            <th>Naam</th>
            <th>Data</th>
            </thead>
            <?php
            foreach ($CustomFields as $SpecName => $SpecText) { ?>
                <tr>
                    <td>
                        <?php print $SpecName; ?>
                    </td>
                    <td>
                        <?php
                        if (is_array($SpecText)) {
                            foreach ($SpecText as $SubText) {
                                print $SubText . " ";
                            }
                        } else {
                            print $SpecText;
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            </table><?php
        } else ?>
                <?php
            }
            ?>
        </div>
    <?php
?>