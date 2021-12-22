<?php
include __DIR__ . "/header.php";

function berekenVerkoopPrijs($adviesPrijs, $btw)
{
    return $btw * $adviesPrijs / 100 + $adviesPrijs;
}

function getVoorraadTekst($actueleVoorraad)
{
    if ($actueleVoorraad > 1000) {
        return "Ruime voorraad beschikbaar.";
    } else {
        return "Voorraad: $actueleVoorraad";
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1 style='color: #6DAFFE; border-radius: 10px; text-align: center'></h1>

<?php
// Prepare variables
$cart = getCart();

$totalAmount = 0;
$table = null;
$value = 0;
/*
 * Open table and add first row with column names if cart is filled with products,
 * or display text to indicate that the cart is empty
 */
if (count($cart) > 0) {
    echo "<h1 class='CartContents'> </h1>
<table style='color: #EDF6FF; background-color: #6DAFFE; border-radius 10px; margin: auto'>
    <tr>
        <th>Productnaam</th>
        <th>Afbeelding</th>
        <th>Aantal</th>
        <th>Prijs</th>
    <tr>";
    } else {
    echo "<br><h4 style='text-align: center;'>Je winkelmand is leeg. <a href='http://localhost/nerdygadgets'><u>Shop nu!</u></a></h4>";
}

// This loop creates a table row for every product
foreach ($cart as $id => $item) {
    $_SESSION['id'] = $id;
    // Use amount from the GET request when the product amount was changed
    isset($_GET['amount']) ? $amount = $_GET['amount'] : $amount = $item['amount'];

    // Update cart when amount was changed
    if (isset($_GET['target'])) {
        adjustCartAmount($amount, $id);
        $cart[$id] = $amount;
    }

    if ($amount == 0) {
        deleteFromCart($id);
    } else {
        $StockItemName = $item['StockItemName'];
        $StockItemPath = $item['StockItemPath'];

        // Calculate prices
        $price = ($item['price'] * $amount);
        $roundedPrice = round($item['price'] * $amount, 2);
        $value += $price;
        $totalAmount += $amount;

        echo "<tr>
                <th><!--Name-->
                    <a style='color: #EDF6FF' href='http://localhost/nerdygadgets/view.php?id=$id'>$StockItemName</a>
                </th>
                <th><!--Image-->
                    <img src='Public/StockItemIMG/$StockItemPath' width='100' alt='Product afbeelding'>
                </th>
                <th><!--Amount input-->
                    <form method='GET' action='Cart.php'>
                        <input type='number' name='amount' value='$amount' size='1' style='height:40px; width:60px'>
                        <input type='hidden' name='target' value='$id'>
                    </form>
                </th>
                <th>$roundedPrice</th>
              </tr>";
    }
}

$value = round($value, 2);

// Add last row and close table
if (count($cart) > 0) {
    echo "<tr>
            <th>Totaal:</th>
            <th><!--Empty space for image--></th>
            <th>$totalAmount</th>
            <th>$value</th>
         </table>";
}


if (isset($_SESSION['email'])) {
    echo "<form method='GET' action='Payment.php' class='CartOrderButton'>
            <input type='text' name='value' value='$value' hidden>
            <input style='height: 48px; width: 240px' type='submit' name='submit' value='Bestellen'> 
        </form>";
} else {
    echo "<form method='GET' action='Login.php' class='CartOrderButton'>
            <input style='height: 48px; width: 240px; margin-top: 15px; border-radius: 10px' type='submit' name='submit' value='Bestellen'>
          </form>";
}

?>

<h1 style='text-align:center'>Misschien is dit ook wat voor U?</h1>

<?php
$id = $_SESSION['id'];
$sql = "SELECT StockGroupID FROM stockitemstockgroups WHERE StockItemID ='$id'";

$Statement = mysqli_prepare($databaseConnection, $sql);
mysqli_stmt_execute($Statement);
$ReturnableResult = mysqli_stmt_get_result($Statement);
$record = mysqli_fetch_assoc($ReturnableResult);
$category = $record['StockGroupID'];

$sql = "SELECT StockItemID from stockitemstockgroups WHERE StockGroupID = '$category'";

$result = mysqli_query($databaseConnection, $sql);
$resultaat = array();
$i = 0;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $StockItemID = $row["StockItemID"];
    $resultaat[$i] = $StockItemID;
    $i++;
}
echo "<table style='color: #EDF6FF; background-color: #6DAFFE; border-radius 10px; margin: auto'>";
$aanbevelen = array_rand($resultaat, 5);
    foreach($aanbevelen as $row){
        $sql = "SELECT S.StockItemName, S.RecommendedRetailPrice, I.ImagePath FROM stockitems S LEFT JOIN stockitemimages I on S.StockItemID = I.StockItemID WHERE S.StockItemID = '$row'";
        $result = mysqli_query($databaseConnection, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $StockItemName = $row['StockItemName'];
                $RecommendedRetailPrice = $row['RecommendedRetailPrice'];
                $ImagePath = $row['ImagePath'];

                $sql = "SELECT StockItemID FROM stockitems WHERE StockItemName = '$StockItemName'";
                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);
                $ReturnableResult = mysqli_stmt_get_result($Statement);
                $record = mysqli_fetch_assoc($ReturnableResult);
                $id2 = $record['StockItemID'];

                echo "<tr>
                <th><!--Name-->
                    <a style='color: #EDF6FF' href='http://localhost/nerdygadgets/view.php?id=$id2'>$StockItemName</a>
                </th>
                <th><!--Image-->
                    <img src='Public/StockItemIMG/$ImagePath' width='100' alt='Product afbeelding'>
                </th>
                <form method='GET' action='Cart.php'>
                        <input type='hidden' name='target' value='$id2'>
                    </form>";
            }
    }
echo "</table>";


include __DIR__ . "/footer.php";
?>
</body>
</html>