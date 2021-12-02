<?php

include "CartFuncties.php";
if (isset($_GET["submit"])) addProductToCart($_GET["stockItemID"], $_GET['SellPrice'], $_GET['StockItemName'], $_GET['StockItemPath']);
var_dump($_GET['ImagePath']);
?>

<meta http-equiv="refresh"
      content="0.1;url=http://localhost/nerdygadgets/Cart.php">
