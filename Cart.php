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
echo createTable($cart);

function createTable($cart)
{
    $table = "<table border='1'><tr><th>product</th><th>aantal</th><th>prijs</th><tr>";
    $total = 0;

    foreach ($cart as $id => $item) {
        $amount = $item['amount'];
        $price = round($item['price'] * $amount, 2);
        $total += $price;

        $table .= "<tr>
                        <th><a href='http://localhost/nerdygadgets/view.php?id=$id'>$id</a></th>
                        <th>$amount</th>
                        <th>$price</th>
                   </tr>";

        if (end($cart) === $item) {
            $total = round($total, 2);
            $table .= "<tr><th>Totaal:</th><th>$total</th></table>";
        }
    }

    return $table;
}

if(isset($_GET["stockItemID"])){
    $stockItemID = $_GET["stockItemID"];
    echo "<a href='view.php?id=$stockItemID'> Naar artikelpagina van artikel $stockItemID </a>";
}

?>
</a>
</body>
</html>