<?php

require_once 'bootstrap.php';

use DBAL\Connection;

$connection = new Connection([
    'provider' => 'mysql',
    'host' => 'localhost',
    'port' => 3306
], "root", "root");
