<?php
require_once "vendor/autoload.php";

use unit\User;

$engine = 'mysql';
$host = 'localhost';
$database = 'unit';
$user = 'root';
$pass = '';
$dns = $engine.':dbname='.$database.";host=".$host;
$pdo = new PDO($dns, $user, $pass);

$user = new User($pdo);
$fix = [
    ':name' => 'Ivan',
    ':email' => 'ivan@mail.ru'];
$id = [':id' => 2];
print_r($user->select($id));
