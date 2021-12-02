<?php

include "CartFuncties.php";
include "mollie.php";
if (isset($_GET["submit"])) addProductToCart($_GET["stockItemID"], $_GET['SellPrice'], $_GET['StockItemName'], $_GET['StockItemPath']);

setupPayment('0.12', 'Test betaling', '1');
?>

<!--<meta http-equiv="refresh"-->
<!--      content="0.1;url=http://localhost/nerdygadgets/Cart.php">-->