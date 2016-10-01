<?php
use Pimple\Container;

$container = new Container();
$container['dsn'] = "mysql:host=localhost;dbname=phpoo;charset=utf8";
$container['user'] = "root";
$container['pass'] = "";