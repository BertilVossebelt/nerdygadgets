<?php
include __DIR__ . "/header.php";

    require_once("database.php");
    session_start();
?>
<h1 style='margin-left:600px'>Account aanmaken</h1>
<div>
    <form style='margin-left:600px' method="get">
        <label style='margin-bottom:0px' for="Aanhef">Aanhef</label> <br>
        <input style='margin-bottom:0px; height:13px; width:13px' type="radio" name="Aanhef" required> Dhr.
        <input style='margin-bottom:0px; height:13px; width:13px; margin-left:5px' type="radio" name="Aanhef" required> Mevr. <br>
        <label style='margin-bottom:0px' for="Voornaam">Voornaam:</label><br>
        <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Voornaam" required> <br>
        <label style='margin-bottom:0px' for="Tussenvoegsel">Tussenvoegsel (optioneel):</label><br>
        <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Tussenvoegsel"> <br>
        <label style='margin-bottom:0px' for="Achternaam">Achternaam:</label><br>
        <input style='height:40px; width:300px; margin-bottom:10px' type="text" name="Achternaam" required> <br>
        <label style='margin-bottom:0px' for="Postcode">Postcode:</label><label style='margin-bottom:0px; margin-left:36px' for="Huisnummer">Huisnr.:</label><label style='margin-bottom:0px; margin-left:28px' for="Toevoeging">Toevoeging (optioneel):</label><br>
        <input style='height:40px; width:90px; margin-bottom:10px' type="text" name="Postcode" required>
        <input style='height:40px; width:65px; margin-bottom:10px; margin-left:10px' type="number" name="Huisnummer" required>
        <input style='height:40px; width:100px; margin-bottom:10px; margin-left:10px' type="text" name="Toevoeging"> <br>
        <label style='margin-bottom:0px' for="Woonplaats">Woonplaats:</label> <br>
        <input style='height:40px; width: 200px; margin-bottom:10px' type="text" name="Woonplaats" required> <br>
        <label style='margin-bottom:0px' for="eMail">E-Mail:</label> <br>
        <input style='height:40px; width: 300px; margin-bottom:10px' type="text" name="eMail" required> <br>
        <label style='margin-bottom:0px' for="Wachtwoord">Wachtwoord:</label> <br>
        <input style='height:40px; width: 300px; margin-bottom:10px' type="password" name="Wachtwoord" required> <br>

            <input style='height:40px; width:100px; margin-bottom:10px' type="submit" name="registreer" value="Registreer">


        <?php
        if (isset($_GET['registreer'])) {
            $aanhef = $_GET['Aanhef'];
            $voornaam = $_GET['Voornaam'];
            $tussenvoegsel = $_GET['Tussenvoegsel'];
            $achternaam = $_GET['Achternaam'];
            $postcode = $_GET['Postcode'];
            $huisnummer = $_GET['Huisnummer'];
            $toevoeging = $_GET['Toevoeging'];
            $woonplaats = $_GET['Woonplaats'];
            $email = $_GET['eMail'];
            $wachtwoord = $_GET['Wachtwoord'];
            /*
                    $sql = "SELECT * FROM accounts WHERE email = $email";

                    $Statement = mysqli_prepare($databaseConnection, $sql);
                    mysqli_stmt_execute($Statement);
                    $ReturnableResult = mysqli_stmt_get_result($Statement);
                    $ReturnableResult = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC);

                    if (mysqli_num_rows($sql) == 0) {
                        $id = '';
                    } else {
                        $error_msg = "Deze email is al gekozen.";
                    }
            */

            $wachtwoord = md5($wachtwoord);

            try {
                $sql = "INSERT INTO accounts VALUES(
                            '$aanhef', '$voornaam', '$tussenvoegsel', '$achternaam', '$postcode', '$huisnummer', '$toevoeging', '$woonplaats', '$email', '$wachtwoord')";


                $Statement = mysqli_prepare($databaseConnection, $sql);
                mysqli_stmt_execute($Statement);
            } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
            echo "<script>
        window.location = 'RedirectiDeal.php';
    </script>";
        }


        /*$sql = "SELECT * FROM accounts WHERE email='$email'";


        $Statement = mysqli_prepare($databaseConnection, $sql);
        mysqli_stmt_execute($Statement);
        $ReturnableResult = mysqli_stmt_get_result($Statement);
        $ReturnableResult = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC);


        if (mysqli_num_rows($sql) == 1) {
        } else
            $error_msg = 'An error occurred and your account was not created.';


    */

        ?>

    </form>
</div>

