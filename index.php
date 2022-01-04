<?php
include "env_loader.php";
include "./Helpers/Database.php";
include "./Helpers/CartFuncties.php";
include "./Helpers/WishlistFuncties.php";

$cart = getCart();
$databaseConnection = connectToDatabase();

include __DIR__ . "/Views/Sections/base.php";