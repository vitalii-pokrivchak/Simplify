<?php

require_once 'bootstrap.php';

use ORM\Core\SimplifyConnection;

$connection = new SimplifyConnection([
    'provider' => 'mysql',
    'host' => 'localhost',
    'port' => 3306
], "root", "root");
