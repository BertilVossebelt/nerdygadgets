<?php
include "CartFuncties.php";
include __DIR__ . "/header.php";
//include "database.php";
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
echo createTable($cart, $databaseConnection);

function createTable($cart, $databaseConnection)
{
    $table = "<table border='2'><tr> <th>Productnaam</th><th>Afbeelding</th><th>Aantal</th><th>Prijs</th><tr>";
    $total = 0;
    $totalamount = 0;

    foreach ($cart as $id => $item) {
        $amount = $item['amount'];
        $StockItemName = $item['StockItemName'];
        $StockItemPath = $item['StockItemPath'];
        $price = round($item['price'] * $amount, 2);
        $total += $price;
        $totalamount += $amount;

        $table .= "<tr>
                        <th><a href='http://localhost/nerdygadgets/view.php?id=$id'>$StockItemName</a></th>
                        <th><img src='Public/StockItemIMG/$StockItemPath' width='100' alt='Product afbeelding'></th>
                        <th>$amount</th>  
                        <th>$price</th>
                   </tr>";
        if (end($cart) === $item) {
            $total = round($total, 2);
            $table .= "<tr><th>Totaal:</th><th><!--afbeelding--></th><th>$totalamount</th><th>$total</th></table>";
        }
    }

    return $table;
}

if(isset($_GET["stockItemID"])){
    $stockItemID = $_GET["stockItemID"];
    echo "<a href='view.php?id=$stockItemID'> Naar artikelpagina van artikel $stockItemID </a>";
}

?>

</body>
</html>