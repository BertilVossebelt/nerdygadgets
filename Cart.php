<?php
include __DIR__ . "/header.php";
include "CartFuncties.php";
include "mollie.php";

if(isset($_GET['pay'])) setupPayment($_GET['value'], 'Test betaling', '1');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
<?php
$cart = getCart();
echo createTable($cart, $databaseConnection);

function createTable($cart, $databaseConnection)
{
    $totalamount = 0;
    $table = null;
    if (count($cart) != 0) {
        $table = "<h1>Inhoud Winkelwagen</h1>
                  <table border='2'><tr><th>Productnaam</th><th>Afbeelding</th><th>Aantal</th><th>Prijs</th><tr><tr>";
    }
    $total = 0;

    foreach ($cart as $id => $item) {
        if (isset($_GET[$id])) {
            $amount = $_GET["amount"];
            $cart[$id] = $amount;
            adjustCartAmount($amount, $id);
        } else {
            $amount = $item['amount'];
        }
        $StockItemName = $item['StockItemName'];
        $StockItemPath = $item['StockItemPath'];
        if ($amount != 0) {
            $price = ($item['price'] * $amount);
            $roundedPrice = round($item['price'] * $amount, 2);
            $total += $price;
            $totalamount += $amount;

            $table .= "
                    <th><a href='http://localhost/nerdygadgets/view.php?id=$id'>$StockItemName</a></th>
                    <th><img src='Public/StockItemIMG/$StockItemPath' width='100' alt='Product afbeelding'></th>
                    <th><form method='GET'><input type='number' name='amount' value='$amount'
                    size='1' style='height:40px; width:60px'>
                    <input type='hidden' name='$id' value='toevoegen'>
                    </form></th>
                    <th>$roundedPrice</th>
               </tr>";
        }
    }

    $total = round($total, 2);

    $table .= "<tr><th>Totaal:</th><th></th><th>$totalamount</th><th>$total</th></table>
               <form method='GET' action='Cart.php'>
               <input type='text' name='value' value='$total' hidden>
               <button type='submit' name='pay' value='pay'>Betalen</button>
               </form>";

    if($totalamount == 0) {
        print("<br><H1><center>Je winkelmand is leeg. <a href='http://localhost/nerdygadgets'><u>Shop nu!</u></a></center></H1>");
    }
    elseif(empty($_SESSION['email'])) {
        $table .= "<tr><th>Totaal:</th><th><!--afbeelding--></th><th>$totalamount</th><th>$total</th></table>
    <form method='get' action='redirectPaymentChoice.php'>
        <input style='height: 48px; width: 240px' type='submit' name='submit' value='Bestellen'> </form>";
    } else{
        $table .= "<tr><th>Totaal:</th><th><!--afbeelding--></th><th>$totalamount</th><th>$total</th></table>
    <form method='get' action='RedirectiDeal.php'>
        <input style='height: 48px; width: 240px' type='submit' name='submit' value='Bestellen'> </form>";
    }

    return $table;
}
if(isset($_GET["stockItemID"])){
    $stockItemID = $_GET["stockItemID"];
    echo "<a href='view.php?id=$stockItemID'> Naar artikelpagina van artikel $stockItemID <br></a>";
}
?>

</body>
</html>