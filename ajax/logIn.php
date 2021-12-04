<?php
session_start();
require __DIR__ . '/../database/DatabaseFunction.php';

$manager = new DatabaseFunction();


if (!empty($_POST["user_email"]) && $_POST["user_email"] != null) {
    if (!empty($_POST["user_password"]) && $_POST["user_password"] != null) {
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
        $resultOfLogin = $manager->login($user_email, $user_password);
        if (!$resultOfLogin) {
            echo 'wrong password';
        } else {
            echo 'you\'re conncted';
            $_SESSION["id"] = $resultOfLogin["id"];
            $_SESSION["role"] = $resultOfLogin["role"];
        }
    } else {
        echo 'user password incorrect';
    }
} else {
    echo 'user email incorrect';
}
