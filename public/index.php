<?php
require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/constants.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require dirname(__DIR__) . '/config/database.php';
require dirname(__DIR__) . '/router/router.php';
