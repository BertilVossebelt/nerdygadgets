<?php
include __DIR__ . "/header.php";
?>

<form style='border-radius: 20px; margin-left: 600px;margin-right: 600px; background-color: #6DAFFE' method="get">
    <label style='margin-bottom:0px' for="Voornaam">Voornaam:</label><br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Voornaam" value="<?php echo $_SESSION['voornaam']; ?>" required> <br>
    <label style='margin-bottom:0px' for="Tussenvoegsel">Tussenvoegsel (optioneel):</label><br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Tussenvoegsel" value="<?php echo $_SESSION['tussenvoegsel']; ?>"> <br>
    <label style='margin-bottom:0px' for="Achternaam">Achternaam:</label> <br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Achternaam" value="<?php echo $_SESSION['achternaam']; ?>" required> <br>
    <label style='margin-bottom:0px' for="Postcode">Postcode:</label><label
        style='margin-bottom:0px; margin-left:36px' for="Huisnummer">Huisnr.:</label><label
        style='margin-bottom:0px; margin-left:28px' for="Toevoeging">Toevoeging (optioneel):</label><br>
    <input style='height:40px; width:90px; margin-bottom:10px' type="text" name="Postcode" value="<?php echo $_SESSION['postcode']; ?>" required>
    <input style='height:40px; width:65px; margin-bottom:10px; margin-left:10px' type="number" name="Huisnummer" value="<?php echo $_SESSION['huisnummer']; ?>"
           required>
    <input style='height:40px; width:100px; margin-bottom:10px; margin-left:10px' type="text" name="Toevoeging" value="<?php echo $_SESSION['toevoeging']; ?>">
    <br>
    <label style='margin-bottom:0px' for="Woonplaats">Woonplaats:</label> <br>
    <input style='height:40px; width: 200px; margin-bottom:10px' type="text" name="Woonplaats" value="<?php echo $_SESSION['woonplaats']; ?>" required> <br>
    <input style='height:40px; width:100px; margin-bottom:10px' type="submit" name="wijzig" value="Wijzig">
</form>

<?php

if(isset($_GET['wijzig'])) {
    if ($_GET['Voornaam'] != $_SESSION['voornaam'] || $_GET['Tussenvoegsel'] != $_SESSION['tussenvoegsel'] || $_GET['Achternaam'] != $_SESSION['achternaam'] || $_GET['Postcode'] != $_SESSION['postcode'] || $_GET['Huisnummer'] != $_SESSION['huisnummer'] || $_GET['Toevoeging'] != $_SESSION['toevoeging'] || $_GET['Woonplaats'] != $_SESSION['woonplaats']) {

        $voornaam = $_GET['Voornaam'];
        $tussenvoegsel = $_GET['Tussenvoegsel'];
        $achternaam = $_GET['Achternaam'];
        $postcode = $_GET['Postcode'];
        $huisnummer = $_GET['Huisnummer'];
        $toevoeging = $_GET['Toevoeging'];
        $woonplaats = $_GET['Woonplaats'];
        $klantnummer = $_SESSION['klantnummer'];

        $sql = "UPDATE accounts SET voornaam='$voornaam', tussenvoegsel='$tussenvoegsel', achternaam='$achternaam', postcode='$postcode', huisnummer='$huisnummer', toevoeging='$toevoeging', woonplaats='$woonplaats' WHERE klantnummer='$klantnummer'";
        $Statement = mysqli_prepare($databaseConnection, $sql);
        mysqli_stmt_execute($Statement);

        $sql = "SELECT * FROM accounts WHERE klantnummer='$klantnummer'";

        $Statement = mysqli_prepare($databaseConnection, $sql);
        mysqli_stmt_execute($Statement);
        $ReturnableResult = mysqli_stmt_get_result($Statement);

        if (mysqli_num_rows($ReturnableResult) == 1) {
            $record = mysqli_fetch_assoc($ReturnableResult);
            $_SESSION['email'] = $record['email'];
            $_SESSION['klantnummer'] = $record['klantnummer'];
            $_SESSION['voornaam'] = $record['voornaam'];
            $_SESSION['tussenvoegsel'] = $record['tussenvoegsel'];
            $_SESSION['achternaam'] = $record['achternaam'];
            $_SESSION['postcode'] = $record['postcode'];
            $_SESSION['huisnummer'] = $record['huisnummer'];
            $_SESSION['toevoeging'] = $record['toevoeging'];
            $_SESSION['woonplaats'] = $record['woonplaats'];
        }
        echo "<script>
        window.location = 'Account.php'
    </script>";
    }
}

?>
