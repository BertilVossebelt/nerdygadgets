<?php

$variables = [
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => 'root',
    'DB_NAME' => 'nerdygadgets',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}