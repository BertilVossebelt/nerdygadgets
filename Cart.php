<?php
include __DIR__ . "/header.php";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
<h1 style='color: #6DAFFE; border-radius: 10px; text-align: center'>Winkelwagen</h1>

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
    echo "<table style='color: #EDF6FF; background-color: #6DAFFE; border-radius 10px; margin: auto'>
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
    echo "<form method='GET' action='Payment.php'>
            <input type='text' name='value' value='$value' hidden>
            <input style='height: 48px; width: 240px' type='submit' name='submit' value='Bestellen'> 
        </form>";
} else {
    echo "<form method='GET' action='Login.php'>
            <input style='height: 48px; width: 240px; margin-top: 15px; border-radius: 10px' type='submit' name='submit' value='Bestellen'>
          </form>";
}
?>

</body>
</html>