<?php

require 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
   "driver"     => "mysql",
   "host"       => "localhost",
   "database"   => "YOUR_DB_NAME_HERE",
   "username"   => "YOUR_DB_USERNAME_HERE",
   "password"   => "YOUR_DB_PASSWORD_HERE",
   "charset"    => "utf8mb4",
   "collation"  => "utf8mb4_general_ci"
]);

$capsule->bootEloquent();
