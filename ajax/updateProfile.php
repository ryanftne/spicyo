<?php
session_start();
require __DIR__ . '/../database/DatabaseFunction.php';

$manager = new DatabaseFunction();

$datas = $_POST["datas"];


$manager->updateProfile($_SESSION["id"], $datas["name"], $datas["firstname"], $datas["email"], $datas["phone"], $datas["address"], $datas["city"], $datas["postal_code"]);
// echo $_SESSION["id"];
// echo $datas["postal_code"];
echo 'Success';
