<?php
include __DIR__ . '/header.php';
?>

<h1 style='text-align:center'>Voer hier uw gegevens in: </h1>
<form style='margin-left:610px' method="get">
    <label style='margin-bottom:0px' for="Voornaam">Voornaam:</label><br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Voornaam" required> <br>
    <label style='margin-bottom:0px' for="Tussenvoegsel">Tussenvoegsel (optioneel):</label><br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Tussenvoegsel"> <br>
    <label style='margin-bottom:0px' for="Achternaam">Achternaam:</label><br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Achternaam" required> <br>
    <label style='margin-bottom:0px' for="Postcode">Postcode:</label><label style='margin-bottom:0px; margin-left:36px' for="Huisnummer">Huisnr.:</label><label
            style='margin-bottom:0px; margin-left:28px' for="Toevoeging">Toevoeging (optioneel):</label><br>
    <input style='height:40px; width:90px; margin-bottom:10px' type="text" name="Postcode" required>
    <input style='height:40px; width:65px; margin-bottom:10px; margin-left:10px' type="number" name="Huisnummer"
           required>
    <input style='height:40px; width:100px; margin-bottom:10px; margin-left:10px' type="text" name="Toevoeging"> <br>
    <label style='margin-bottom:0px' for="Woonplaats">Woonplaats:</label> <br>
    <input style='height:40px; width: 200px; margin-bottom:10px' type="text" name="Woonplaats" required> <br>
    <label style='margin-bottom:0px' for="Email">E-Mail:</label> <br>
    <input style='height:40px; width: 300px; margin-bottom:10px' type="text" name="Email" required> <br>
    <input style='height:40px; width:100px; margin-bottom:10px' type="submit" name="Bestel" value="Bestel!">
</form>

<?php
if (isset($_GET['Bestel'])) {


    $voornaam = $_GET['Voornaam'];
    $tussenvoegsel = $_GET['Tussenvoegsel'];
    $achternaam = $_GET['Achternaam'];
    $postcode = $_GET['Postcode'];
    $huisnummer = $_GET['Huisnummer'];
    $toevoeging = $_GET['Toevoeging'];
    $woonplaats = $_GET['Woonplaats'];
    $email = $_GET['Email'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO orders VALUES(
            '', '', '$date'
)";

    $Statement = mysqli_prepare($databaseConnection, $sql);
    mysqli_stmt_execute($Statement);

    $sql = "INSERT INTO orderlines VALUES(
            '', '', '2', 'Description', '3', '$email', '', '$voornaam', '$tussenvoegsel', '$achternaam', '$huisnummer' , '$toevoeging', '$woonplaats'                               
)";

    $Statement = mysqli_prepare($databaseConnection, $sql);
    mysqli_stmt_execute($Statement);
    /*
         echo "<script>
            window.location = 'Categories.php';
        </script>";
    */
}
include __DIR__ . "/footer.php";
?>