<?php
include __DIR__ . "/header.php"
?>
<form style="margin-left:700px">
    <label style='margin-bottom:0px' for="nieuwwachtwoord">Nieuw wachtwoord: </label> <br>
    <input style='height:40px; width:300px; margin-bottom:10px' type="password" name="nieuwwachtwoord"> <br>
    <input style='height: 48px; width: 240px' type="submit" name="wachtwoordsturen" value="Wachtwoord wijzigen">
    <?php
    if(isset($_GET['wachtwoordsturen'])){
        $klantnummer = $_SESSION['klantnummer'];
        $wachtwoord = $_GET['nieuwwachtwoord'];
        $wachtwoord = md5($wachtwoord);
        $sql = "UPDATE accounts SET wachtwoord = '$wachtwoord' WHERE klantnummer='$klantnummer'";
        $Statement = mysqli_prepare($databaseConnection, $sql);
        mysqli_stmt_execute($Statement);
        echo "<script>
        window.location = 'Account.php'
    </script>";
    }
    ?>
</form>


