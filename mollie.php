<?php
require_once 'vendor/autoload.php';
include 'env_loader.php';

function setup () {
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey(env('MOLLIE_TEST_KEY'));
    return $mollie;
}

function setupPayment($value, $description) {
    echo $value;
    $payment = setup()->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => $value,
        ],
        "description" => $description,
        "redirectUrl" => env('APP_DOMAIN') . "/" . env('APP_FOLDER') . "/PaymentSuccess.php",
    ]);

    header("Location: " . $payment->getCheckoutUrl(), true, 303);
}