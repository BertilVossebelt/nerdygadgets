<?php
include __DIR__ . "/header.php";
$email = $_GET['email'];
?>

<div>
    <form method="get">
        <label style='margin-left:300px; margin-bottom:0' for="keuze">Kiez hier uw betaalmethode:</label> <br>
        <select style='margin-left:300px; margin-bottom:25px; width:215px' name="keuze" id="keuze">
            <option value="ideal">iDeal</option>
        </select> <br>
        <input type="text" name="email" value="<?php echo $email?>" hidden>
        <input style='width:215px;margin-left:300px' type="submit" name="Betalen" value="Betalen">
    </form>

    <?php

    $sql = "SELECT klantnummer FROM accounts WHERE email ='$email'";
    $date = date("D-M-Y");

    $Statement = mysqli_prepare($databaseConnection, $sql);
    mysqli_stmt_execute($Statement);
    $ReturnableResult = mysqli_stmt_get_result($Statement);
    $ReturnableResult = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC);

    $customerid = $ReturnableResult;


    if(isset($_GET['Betalen'])){
        $sql = "INSERT INTO orders VALUES(
            '$customerid', '0', '0', '0', '0', '$date', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'
)";

        $Statement = mysqli_prepare($databaseConnection, $sql);
        mysqli_stmt_execute($Statement);
    }

    ?>


</div>