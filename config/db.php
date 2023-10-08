<?php

$host = env('DB_HOST');
$port = env('DB_PORT');
$name = env('DB_NAME');
$user = env('DB_USER');
$pass = env('DB_PASS');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $name,
    'username' => $user,
    'password' => $pass,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
