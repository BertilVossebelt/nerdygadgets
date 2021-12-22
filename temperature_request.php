<?php
include "database.php";
include "CartFuncties.php";
include "env_loader.php";
$databaseConnection = connectToDatabase();
//$sql = "select Temperature, max(RecordedWhen) from coldroomtemperatures group by Temperature ";
//$Statement = mysqli_prepare($databaseConnection, $sql);
//mysqli_stmt_execute($Statement);
//$ReturnableResult = mysqli_stmt_get_result($Statement);

//$sql = "SELECT max(OrderID) FROM orders";
$sql = "SELECT Temperature from coldroomtemperatures where RecordedWhen = (SELECT max(RecordedWhen) from coldroomtemperatures)";
$Statement = mysqli_prepare($databaseConnection, $sql);
mysqli_stmt_execute($Statement);
$ReturnableResult = mysqli_stmt_get_result($Statement);
$record = mysqli_fetch_assoc($ReturnableResult);

print ($record['Temperature']);
return ($record['Temperature']);

//print("hope this works");

