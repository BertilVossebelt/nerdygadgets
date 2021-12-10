<?php
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
<?php
$cart = getCart();
echo createTable($cart, $databaseConnection);

function createTable($cart, $databaseConnection)
{
    $totalamount = 0;
    $table = null;
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




            $table .= "<h1 style='color: #6DAFFE; border-radius: 10px'</h1> <center>Inhoud Winkelwagen</h1>
                    <table style='color: #EDF6FF; background-color: #6DAFFE; border-radius 10px; margin: auto'><tr> <th>Productnaam</th><th>Afbeelding</th><th>Aantal</th><th>Prijs</th><tr>
                    <tr>
                    <th><a style='color: #EDF6FF' href='http://localhost/nerdygadgets/view.php?id=$id'>$StockItemName</a></th>

                    <th
                    
                    ><img src='Public/StockItemIMG/$StockItemPath' width='100' alt='Product afbeelding'></th>
                    <th><form method='GET'><input type='number' name='amount' value='$amount'
                    size='1' style='height:40px; width:60px'>
                    <input type='hidden' name='$id' value='toevoegen'>
                    </form></th>
                    <th>$roundedPrice</th>
               </tr>";
        }
    }

    $total = round($total, 2);
    if($totalamount == 0) {
        print("<br><H1 style='color: #6DAFFE'><center>Je winkelmand is leeg. <a href='http://localhost/nerdygadgets'><u>Shop nu!</u></a></center></H1>");
    }
    elseif(empty($_SESSION['email'])) {
        $table .= "<tr><th>Totaal:</th><th><!--afbeelding--></th><th>$totalamount</th><th>$total</th></table>

    <form method='get' action='redirectPaymentChoice.php'>
        <center><input style='height: 48px; width: 240px; margin-top: 15px; border-radius: 10px' type='submit' name='submit' value='Bestellen'> </form>";
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