    <?php include "cartfuncties.php";
    $stockItemID = $_GET["stockItemID"];
    if (isset($_GET["submit"])) {
        $stockItemID = $_GET["stockItemID"];
        $stockItemPrice = $_GET["SellPrice"];
        addProductToCart($stockItemID);         // maak gebruik van geïmporteerde functie uit cartfuncties.php
//    print("Product toegevoegd aan <a href='cart.php'>je winkelmandje!</a>");
    }
?>
    <meta http-equiv="refresh" content="0.1;url=http://localhost/nerdygadgets/Cart.php?stockItemID=<?php print ($_GET["stockItemID"])?>&SellPrice=<?php print($_GET["SellPrice"])?>">

