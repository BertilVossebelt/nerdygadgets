<?php
include "Cart.php";
include "CartFuncties.php";
if (isset($_GET["submit"]))
$cart = getCart();
createTable($cart, $stockItemPrice);
?>
