<?php
use Mollie\Api\MollieApiClient;

function setup () {
    $mollie = new MollieApiClient();
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
        "redirectUrl" => env('APP_DOMAIN') . "/" . env("APP_FOLDER") . "/" . $orderID,
        "webhookUrl"  => env('APP_DOMAIN') . "/mollie-webhook/",
    ]);

    header("Location: " . $payment->getCheckoutUrl(), true, 303);
}