<?php
require_once 'vendor/autoload.php';
include "env_loader.php";

if (isset($_GET['pay'])) setupPayment($_GET['value'], 'Test betaling');

function setup () {
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey(env('MOLLIE_TEST_KEY'));
    return $mollie;
}

function setupPayment($value, $description) {
    $payment = setup()->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => number_format($value, 2),
        ],
        "description" => $description,
        "redirectUrl" => env('APP_DOMAIN') . "/" . env("APP_FOLDER") . "/betalen-gelukt",
    ]);

    header("Location: " . $payment->getCheckoutUrl(), true, 303);
}