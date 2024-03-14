<?php use Dotenv\Dotenv;
require __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv::createImmutable(__DIR__,"/../.env.url");
$dotenv->safeLoad();