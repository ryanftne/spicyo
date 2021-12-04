<?php
session_start();
require __DIR__ . '/../database/DatabaseFunction.php';

$manager = new DatabaseFunction();

if (!empty($_SESSION["id"]) && $_SESSION["id"] != null) {
    $user_id = $_SESSION["id"];
    if (!empty($_POST["menu_id"]) && $_POST["menu_id"] != null) {
        $menu_id = $_POST["menu_id"];
        $resultOfSelectMenu = $manager->selectMenu($menu_id);
        if ($resultOfSelectMenu["status"] != "disponible") {
            echo 'this product is no longer in stock';
        } else {
            $resultOfSelectPanier = $manager->selectPanier($user_id);
            if ($resultOfSelectPanier != true) {
                $manager->insertPanier($user_id);
                $resultOfSelectPanier2 = $manager->selectPanier($user_id);
                if (empty($resultOfSelectPanier2)) {
                    echo 'an error has occurred, back to the home page 2';
                } else {
                    $manager->insertPanier_menu($resultOfSelectPanier2["panier"], $menu_id);
                    $resultOfSelectPanier_menu2 = $manager->selectPanier_menu($resultOfSelectPanier2["panier"]);
                    if ($resultOfSelectPanier_menu2 != true) {
                        echo 'an error has occurred, cannot add menu, back to the home page 3';
                    } else {
                        echo 'continue';
                    }
                }
            } else {
                $manager->insertPanier_menu($resultOfSelectPanier["panier"], $menu_id);
                $resultOfSelectPanier_menu = $manager->selectPanier_menu($resultOfSelectPanier["panier"]);
                if ($resultOfSelectPanier_menu != true) {
                    echo 'an error has occurred, cannot add menu, back to the home page 4';
                } else {
                    echo 'continue';
                }
            }
        }
    } else {
        $error = "an error has occurred";
        echo $error;
    }
} else {
    $error = 'an error has occurred, you are not connected';
    echo $error;
}
