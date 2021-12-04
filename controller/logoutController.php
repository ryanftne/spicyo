<?php

require __DIR__ . '/../database/DatabaseFunction.php';

class logoutController
{
    private $databaseFunction;

    public function __construct()
    {
        $this->databaseFunction = new DatabaseFunction();
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location: index.php');
        exit;
    }
}
