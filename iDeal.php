<?php
include __DIR__ . "/header.php";
include "mollie.php";

$value = $_GET['value'];
$klantnummer = $_SESSION['klantnummer'];
$cart = getCart();
if(isset($_GET['pay'])) setupPayment($_GET['value'], 'Test betaling', '1');
?>

<div>
    <form method='GET' action='iDeal.php'>
        <label style='margin-left:300px; margin-bottom:0' for="keuze">Kies hier uw betaalmethode:</label> <br>
        <select style='margin-left:300px; margin-bottom:25px; width:215px' name="keuze" id="keuze">
            <option value="ideal">iDeal</option>
        </select> <br>
        <input type='text' name='value' value='<?php echo $value ?>' hidden>
        <button style='width:215px;margin-left:300px' type='submit' name='pay' value='pay'>Betalen</button>
    </form>
    <?php
        if (isset($_GET['Betalen'])) {
            $sql = "SELECT max(OrderID) FROM orders";

            $Statement = mysqli_prepare($databaseConnection, $sql);
            mysqli_stmt_execute($Statement);
            $ReturnableResult = mysqli_stmt_get_result($Statement);

            if (mysqli_num_rows($ReturnableResult) == 1) {
                $record = mysqli_fetch_assoc($ReturnableResult);

                $OrderID = $record['max(OrderID)'];
                $OrderID++;

            $date = date("Y-m-d");
            $sql = "INSERT INTO orders VALUES(
                '$OrderID', '$klantnummer','$date')";

            $Statement = mysqli_prepare($databaseConnection, $sql);
            mysqli_stmt_execute($Statement);

            foreach ($cart as $id => $item) {
                $StockItemName = $item['StockItemName'];
                $amount = $item['amount'];
                $sql = "INSERT INTO orderlines VALUES(
                '', '$OrderID', '$id', '$StockItemName', '$amount')";

                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);

                $sql = "UPDATE stockitemholdings SET QuantityOnHand = QuantityOnHand - '$amount' WHERE StockItemID = '$id' ";

                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);
            }
        }
    }
    ?>


</div>