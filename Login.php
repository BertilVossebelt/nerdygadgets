<?php
include __DIR__ . "/header.php";
include "Extracted.php";
require_once("database.php");

if (isset($_SESSION['email'])){
    echo "U bent al ingelogd.";
    echo "<form method='get'>
            <input style='width:215px; margin-left:300px; margin-bottom:0'  type='submit' name='uitloggen' value='Log Uit'>
";
    if (isset($_GET['uitloggen'])) {
        session_destroy();
        header("Location: Login.php");
    }
} else{
?>

<h1 style="display:inline; margin-left:300px">Inloggen</h1> <h1 style="display:inline; margin-left:580px">
    Registreren</h1> <br>
<div>
    <form method="get">
        <label style='margin-left:300px; margin-bottom:0px' for="Email">E-Mail:</label>
        <p style='display:inline; margin-left:695px'>U heeft nog geen account. </p>
        <input style=' margin-left:300px; width:300px; height:40px' type="email" name="Email" required>
        <p style='display:inline; margin-left:443px'>Registreer U door op de knop</p><br>
        <label style='margin-left:300px; margin-bottom:0px' for="Wachtwoord">Wachtwoord:</label>
        <p style='display:inline; margin-left:650px'>hieronder te drukken.</p><br>
        <input style='margin-bottom:10px; margin-left:300px; width:300px; height:40px' type="password" name="Wachtwoord"
               required> <br>
        <input style='width:215px; margin-left:300px; margin-bottom:0px' type="submit" name="Inloggen" value="Log in">
    </form>
    <form method="get" action="Register.php">
        <input style='width:215px;margin-left:1047px' type="submit" name="Registreren" value="Registreren">
    </form>
    <br>


    <a style='margin-left:700px' href='iDealZA.php'> Bestellen zonder account <br></a>

    <?php
    if (isset($_GET['Inloggen'])) {
        $email = $_GET['Email'];
        $wachtwoord = $_GET['Wachtwoord'];

        $sql = "SELECT * FROM accounts WHERE email='$email'";

        $Statement = mysqli_prepare($databaseConnection, $sql);
        mysqli_stmt_execute($Statement);
        $ReturnableResult = mysqli_stmt_get_result($Statement);

        if (mysqli_num_rows($ReturnableResult) == 1) {
            $record = mysqli_fetch_assoc($ReturnableResult);

            if (password_verify($wachtwoord, $record['wachtwoord'])) {
                extractedAccountData($record);
                echo "<script>window.location = 'iDeal.php';</script>";
            }
        } else {
            echo "Het wachtwoord of email is onjuist.";
        }
    }
    }
    ?>


</div>