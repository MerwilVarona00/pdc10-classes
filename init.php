<?php

include "vendor/autoload.php";
include "config/database.php";

use Models\Connection;
use Models\Class;
use Models\Teacher;
use Models\Student;

$connObj = new Connection($host, $database, $user, $password);
$connection = $connObj->connect();

$mustache = new Mustache_Engine([
    'Loader' => new Mustache_loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

?>
