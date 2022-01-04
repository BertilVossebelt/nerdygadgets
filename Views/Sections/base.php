<!DOCTYPE html>
<html lang="nl">
<head>
    <title>NerdyGadgets</title>
    <meta name="description"
          content="NerdyGadgets is een webshop voor chocolade, computer accessoires en vage progammeer mokken. Wat we nou eigenlijk echt zijn weet niemand,
          maar we verkopen wel een heel bijzondere selectie aan producten">

    <meta name="viewport" content="width=device-width">
    <meta charset="UTF-8">

    <!-- Style sheets-->
    <link rel="stylesheet" href="Public/CSS/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/typekit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include __DIR__ . "/header.php"; ?>

<?php
require_once "./Routes/router.php";

// Start router
$variables = ['databaseConnection' => $databaseConnection];
(new Routes\router)->router($variables);
?>

<?php include __DIR__ . "/footer.php"; ?>

<script src="Public/JS/fontawesome.js"></script>
<script src="Public/JS/jquery.min.js"></script>
<script src="Public/JS/bootstrap.min.js"></script>
<script src="Public/JS/popper.min.js"></script>
<script src="Public/JS/resizer.js"></script>
</body>
</html>