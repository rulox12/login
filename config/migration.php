<?php

require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/constants.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);


$capsule->bootEloquent();
$capsule->setAsGlobal();

Capsule::schema()->dropIfExists('users');
Capsule::schema()->create('users', function($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email');
    $table->string('country');
    $table->string('document');
    $table->string('password');
    $table->timestamps();
});

echo 'Se ejecuto correctamente la migracion';
