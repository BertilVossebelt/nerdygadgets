<?php

$variables = [
    'DB_HOST' => '',
    'DB_USERNAME' => '',
    'DB_PASSWORD' => '',
    'DB_NAME' => '',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}