<?php

$variables = [
    'DB_HOST' => '',
    'DB_USERNAME' => '',
    'DB_PASSWORD' => '',
    'DB_NAME' => '',
    'APP_DOMAIN' => '',
    'APP_FOLDER' => '',
    'MOLLIE_TEST_KEY' => ''
 ];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}