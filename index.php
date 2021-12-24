<?php
include "database.php";
include "env_loader.php";
include "CartFuncties.php";
include "WishlistFuncties.php";

$cart = getCart();

$databaseConnection = connectToDatabase();

$sql = "SELECT rating, aantal FROM rating";

$Statement = mysqli_prepare($databaseConnection, $sql);
mysqli_stmt_execute($Statement);
$ReturnableResult = mysqli_stmt_get_result($Statement);
$record = mysqli_fetch_assoc($ReturnableResult);
$aantal = $record['aantal'];
$rating = round($record['rating'] / $aantal, 1);
?>
<html lang="nl">
<head>
    <title>NerdyGadgets</title>

    <meta name="viewport" content="width=device-width">

    <!-- Javascript -->

    <!-- Style sheets-->
    <link rel="stylesheet" href="Public/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/typekit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
</head>
<body>
<?php include __DIR__ . "/header.php"; ?>

<?php
require_once "./Routes/router.php";

$variables = ['databaseConnection' => $databaseConnection];

// Start router
(new Routes\router)->setup($variables);
?>

<?php include __DIR__ . "/footer.php"; ?>
</body>
</html>