<?php
session_start();
require __DIR__ . '/../database/DatabaseFunction.php';

$manager = new DatabaseFunction();

$_POST["arr"];
$_POST["keyToDelete"];

if (!empty($_POST["arr"]) && $_POST["arr"] != null) {
    $keyToDelete = $_POST["keyToDelete"];
    $JsonArray = json_encode($_POST["arr"]);
    $today = date("F j, Y, g:i a");
    $manager->insertOrder($_SESSION["id"], $JsonArray, $today, 'en attente');
    for ($i = 0; $i < sizeof($keyToDelete); $i++) {
        echo $keyToDelete[$i];
        $manager->deleteFromPanier_menu($keyToDelete[$i]);
    }
    echo 'Success ';
} else {
    echo 'Votre panier est vide..';
}
