<?php

require __DIR__ . '/../database/DatabaseFunction.php';

class AdminController
{
    private $databaseFunction;

    public function __construct()
    {
        $this->databaseFunction = new DatabaseFunction();
    }
}
