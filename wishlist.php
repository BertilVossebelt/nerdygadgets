<?php
include "WishlistFuncties.php";
include "header.php";
$wishlist = getWishlist();
$table = null;

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
    $StockItemName = $item['StockItemName'];
    $StockItemPath = $item['StockItemPath'];
    $price = $item['SellPrice'];
    $roundedPrice = round($item['SellPrice'], 2);
    echo "<tr>
                <th><!--Name-->
                    <a style='color: #EDF6FF' href='http://localhost/nerdygadgets/view.php?id=$id'>$StockItemName</a>
                </th>
                <th><!--Image-->
                    <img src='Public/StockItemIMG/$StockItemPath' width='100' alt='Product afbeelding'>
                </th>
                <th><!--Price-->
                    $roundedPrice
                </th>
                <th><!--DeleteButton-->
                    <form method='get' action='wishlist.php'>
                    <button type='submit' name='deleteFromWishlist' class='wishlist-deletion'><i class='fa fa-trash' aria-hidden='true'></i></button>
                    </form>
                </th>
              </tr>";
    if(isset($wishlist['deleteFromWishlist'])) {
        deleteFromWishlist($id);
    }
}


