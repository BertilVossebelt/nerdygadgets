<?php
include "WishlistFuncties.php";
include "header.php";
$wishlist = getWishlist();
//$table = null;

// If wishlist is not empty, it creates the top of the table. Otherwise, it creates a message saying the list is empty.
if (count($wishlist) > 0) {
    echo "<h1 class='wishlistContents'>Inhoud Verlanglijstje</h1>
    <table style='color: #EDF6FF; background-color: #6DAFFE; border-radius 10px; margin: auto'> 
    <tr>
        <th>Productnaam</th>
        <th>Afbeelding</th>
        <th>Prijs</th>
        <th>Verwijderen</th>
    <tr>";
} else {
    echo "<br><h1 class='empty-wishlist'>Je verlanglijstje is leeg. <a href='http://localhost/nerdygadgets'><u>Shop nu!</u></a></h1>";
}

// This loop creates a table row for every product
foreach ($wishlist as $id => $item) {
    if (isset($_GET['target'])) {
        if ($_GET['target'] == $id) {
            deleteFromWishlist($id);
        }
    } else {
//      Table contents are defined and formatted correctly
        $StockItemName = $item['StockItemName'];
        $StockItemPath = $item['StockItemPath'];
        $price = $item['SellPrice'];
        $roundedPrice = round($item['SellPrice'], 2);
//        Table is created
        if (count($wishlist) != 0) {
            echo "<tr>
                <!--Name-->
                <th>
                    <a style='color: #EDF6FF' href='http://localhost/nerdygadgets/view.php?id=$id'>$StockItemName</a>
                </th>
                <!--Image-->
                <th>
                    <img src='Public/StockItemIMG/$StockItemPath' width='100' alt='Product afbeelding'>
                </th>
                <!--Price-->
                <th>
                    $roundedPrice
                </th>
                <!--DeleteButton-->
                <th style='text-align: center'>
                    <form method='get' action='wishlist.php'>
                    <button type='submit' name='deleteFromWishlist' class='wishlist-deletion'><i class='fa fa-close' aria-hidden='true'></i></button>   
                    <input type='hidden' name='target' value='$id'>
                    </form>
                </th>
              </tr>";
        }

    }
}

      include __DIR__ . "/footer.php";
?>
