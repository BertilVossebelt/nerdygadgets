<?php
if (isset($_GET["submit"])) addProductToCart($_GET["stockItemID"], $_GET['SellPrice'], $_GET['StockItemName'], $_GET['StockItemPath']);
?>

<meta http-equiv="refresh"
      content="0.1;url=http://localhost/nerdygadgets/winkelmandje">