<?php
include "CartFuncties.php";
include __DIR__ . "/header.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
<h1>Inhoud Winkelwagen</h1>

<?php
$cart = getCart();

if (isset($_GET["submit"])) {
    $stockItemID = $_GET["stockItemID"];
    $stockItemPrice = $_GET["SellPrice"];
    addProductToCart($stockItemID);// maak gebruik van geïmporteerde functie uit cartfuncties.php
//    print("Product toegevoegd aan <a href='cart.php'>je winkelmandje!</a>");
}
$stockItemID = $_GET["stockItemID"];
$stockItemPrice = $_GET["SellPrice"];
$cart = getCart();
function createTable($cart, $stockItemPrice)
{
    $table = "<table border='1'><tr><th>product</th><th>aantal</th><th>prijs</th><tr>";
    $price = 0;
    $i = 0;
    foreach ($cart as $item => $amount) {
        $i++;
        $price += $stockItemPrice * $amount;
        $productUrl = "http://localhost/workshop_sessies/viewCart.php?id=$item";
        $table .= "<tr>
                        <th><a href='$productUrl'>$item</a></th>
                        <th>$amount</th>
                        <th>$stockItemPrice</th>
                   </tr>";
        if ($i === count($cart)) {
            $table .= "<tr><th>Totaal:</th><th>$price</th></table>";
        }
    }
    return $table;
}

print (createTable($cart, $stockItemPrice));
//gegevens per artikelen in $cart (naam, prijs, etc.) uit database halen
//totaal prijs berekenen
//mooi weergeven in html
?>
<p><a href='view.php?id=<?php print ($stockItemID)?>'>Naar artikelpagina van artikel <?php print ($stockItemID)?></a></p>
</body>
</html>