<?php

require __DIR__ . '/../database/DatabaseFunction.php';

$manager = new DatabaseFunction();

$formData = $_POST["formData"];

$manager->insertUser($formData["name"], $formData["firstname"], $formData["email"], $formData["password"], $formData["phone"], $formData["address"], $formData["city"], $formData["postal"]);
