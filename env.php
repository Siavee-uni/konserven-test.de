<?php
$variables = [
    'APP_KEY' => '937a4a8c13e317dfd28effdd479cad2f',
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',
    'DB_NAME' => 'products',
    'USER_NAME' => 'test123',
    'USER_PW' => '123'
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}