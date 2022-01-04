<?php
include "Helpers/Database.php";

$databaseConnection = connectToDatabase();

$sql = "SELECT Temperature from coldroomtemperatures where RecordedWhen = (SELECT max(RecordedWhen) from coldroomtemperatures)";
$Statement = mysqli_prepare($databaseConnection, $sql);
mysqli_stmt_execute($Statement);
$ReturnableResult = mysqli_stmt_get_result($Statement);
$record = mysqli_fetch_assoc($ReturnableResult);

print($record['Temperature']);
return ($record['Temperature']);