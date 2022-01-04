<?php
if(!isset($_SESSION['email'])){
    echo "U bent nog niet ingelogd.";
    echo "<form method='get' action='login'>
            <input style='width:215px; margin-left:300px; margin-bottom:0'  type='submit' name='logIn' value='Log hier in'>";
} else{
?>

<h2 style='margin-left:700px; margin-bottom:0'>Hallo <?php echo $_SESSION['voornaam'] . " " . $_SESSION['tussenvoegsel'] . " " .  $_SESSION['achternaam']; ?></h2><br>
<p style='margin-left:700px; margin-bottom:35px'>Uw gegevens:</p>
<p style='margin-left:700px; margin-bottom:15px'>Postcode:  <?php echo $_SESSION['postcode']; ?></p>
<p style='margin-left:700px; margin-bottom:15px'>Huisnummer:  <?php echo $_SESSION['huisnummer'] . $_SESSION['toevoeging'];?></p>
<p style='margin-left:700px; margin-bottom:15px'>Woonplaats:  <?php echo $_SESSION['woonplaats']; ?></p>
<p style='margin-left:700px; margin-bottom:15px'>Email:  <?php echo $_SESSION['email'];?></p>
<form method="get">
    <input style='height: 48px; width: 240px; margin-left:700px' type="submit" name="wijzigww" value="Wachtwoord wijzigen"><br>
    <input style='height: 48px; width: 240px; margin-left:700px' type="submit" name="gegevenswijzigen" value="Gegevens wijzigen">
</form>
<?php
    if(isset($_GET['gegevenswijzigen'])) echo "<script>window.location = 'gegevens-wijzigen';</script>";
    if(isset($_GET['wijzigww'])) echo "<script>window.location = 'wachtwoord-wijzigen';</script>";
}
?>