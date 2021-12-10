<?php
include __DIR__ . "/header.php";

if(!isset($_SESSION['email'])){
    echo "U bent nog niet ingelogd.";
    echo "<form method='get' action='paymentChoice.php'>
            <input style='width:215px; margin-left:300px; margin-bottom:0px'  type='submit' name='logIn' value='Log hier in'>";
} else{
?>

<h1 style='margin-left:700px; margin-bottom:0'>Hallo <?php echo $_SESSION['voornaam'] . " " . $_SESSION['tussenvoegsel'] . " " .  $_SESSION['achternaam']; ?></h1><br>
<h2 style='margin-left:700px; margin-bottom:35px'>Uw gegevens:</h2>
<h4 style='margin-left:700px; margin-bottom:15px'>Postcode:  <?php echo $_SESSION['postcode']; ?></h4>
<h4 style='margin-left:700px; margin-bottom:15px'>Huisnummer:  <?php echo $_SESSION['huisnummer'] . $_SESSION['toevoeging'];?></h4>
<h4 style='margin-left:700px; margin-bottom:15px'>Woonplaats:  <?php echo $_SESSION['woonplaats']; ?></h4>
<h4 style='margin-left:700px; margin-bottom:15px'>Email:  <?php echo $_SESSION['email'];?></h4>
<form method="get">
    <input style='height: 48px; width: 240px; margin-left:700px' type="submit" name="wijzigww" value="Wachtwoord wijzigen">
    <input style='height: 48px; width: 240px; margin-left:700px' type="submit" name="gegevenswijzigen" value="Gegevens wijzigen">
</form>
<?php
    if(isset($_GET['gegevenswijzigen'])){
        echo "<script>
            window.location = 'changeData.php';
        </script>";
    }

    if(isset($_GET['wijzigww'])){
        echo "<script>
            window.location = 'changePassword.php';
        </script>";
    }
}
?>

