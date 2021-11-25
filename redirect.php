<?php

include "CartFuncties.php";
if (isset($_GET["submit"])) addProductToCart($_GET["stockItemID"], $_GET['SellPrice']);
?>
<meta http-equiv="refresh"
      content="0.1;url=http://localhost/nerdygadgets/Cart.php?stockItemID=<?php print ($_GET["stockItemID"]) ?>&SellPrice=<?php print($_GET["SellPrice"]) ?>">
