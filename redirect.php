<?php

include "cartfuncties.php";
if (isset($_GET["submit"])) addProductToCart($_GET["stockItemID"], $_GET['sellPrice']);
?>

<meta http-equiv="refresh"
      content="0.1;url=http://localhost/nerdygadgets/Cart.php?stockItemID=<?php print ($_GET["stockItemID"]) ?>&SellPrice=<?php print($_GET["SellPrice"]) ?>">