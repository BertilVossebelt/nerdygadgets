<?php
require_once 'vendor/autoload.php';

function setup () {
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey("test_8EPsAA9euBMeTkEnU3Nsxa9sVH4zss");
    return $mollie;
}

function setupPayment($value, $description, $orderID) {
    $payment = setup()->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => $value,
        ],
        "description" => $description,
        "redirectUrl" => 'https://caa1-145-44-52-136.ngrok.io' . "/" . 'nerdygadgets' . "/" . $orderID,
        "webhookUrl"  => 'https://caa1-145-44-52-136.ngrok.io' . "/mollie-webhook/",
    ]);

    header("Location: " . $payment->getCheckoutUrl(), true, 303);
}