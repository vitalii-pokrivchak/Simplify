<?php


require_once 'vendor/autoload.php';

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');

error_reporting(E_ALL);

use ORM\Core\Connection;

$connection = new Connection([
    'provider' => '',
    'host' => 'localhost',
    'dbname' => 'todo',
    'port' => 3306,
    'user' => "root",
    'password' => 'root'
]);
