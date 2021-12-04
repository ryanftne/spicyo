<?php
session_start();
require __DIR__ . '/../database/DatabaseFunction.php';

$manager = new DatabaseFunction();


if (!empty($_SESSION["id"]) && $_SESSION["id"] != null) {
    $user_id = $_SESSION["id"];
    if (!empty($_POST["id_panier_menu"]) && $_POST["id_panier_menu"] != null) {
        $id_panier_menu = $_POST["id_panier_menu"];
        $manager->deleteFromPanier_menu($id_panier_menu);
        echo 'success';
    } else {
        echo 'an error expected';
    }
} else {
    echo 'you are not connected';
}
