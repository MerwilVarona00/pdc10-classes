<?php

use Dotenv\Dotenv as Env;

$env = Env::createImmutable(__DIR__ . '/../');
$env-> load();

$host = $_ENV['DB_HOST'];
$database = $ENV['DB_DATABASE'];
$user = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

?>