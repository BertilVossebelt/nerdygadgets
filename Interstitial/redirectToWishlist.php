<?php
include "../Helpers/WishlistFuncties.php";

if (isset($_GET["wishlist"])) addProductToWishlist($_GET["stockItemID"], $_GET['SellPrice'], $_GET['StockItemName'], $_GET['StockItemPath']);
?>

<meta http-equiv="refresh"
      content="0.1;url=http://localhost/nerdygadgets/verlanglijstje">