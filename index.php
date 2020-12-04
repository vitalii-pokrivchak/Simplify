<?php

require_once 'bootstrap.php';

use orm\core\SimplifyConnection;

$connection = new SimplifyConnection([
    'provider' => 'mysql',
    'host' => 'localhost',
    'port' => 3306
], "root", "root");

$columns = "ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY, Prename VARCHAR( 50 ) NOT NULL, Name VARCHAR( 250 ) NOT NULL,
 StreetA VARCHAR( 150 ) NOT NULL, StreetB VARCHAR( 150 ) NOT NULL, StreetC VARCHAR( 150 ) NOT NULL, 
 County VARCHAR( 100 ) NOT NULL, Postcode VARCHAR( 50 ) NOT NULL, Country VARCHAR( 50 ) NOT NULL ";

$connection->beginTransaction();
$connection->query('CREATE DATABASE newDB');
$connection->exec("CREATE TABLE IF NOT EXISTS newDB.my_table($columns);");
$connection->commit();
