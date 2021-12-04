<?php

require __DIR__ . '/../database/DatabaseFunction.php';

class CookController
{
    private $databaseFunction;
    private $resultOfSelectAllFoodOrder;
    private $resultOfSelectAllStatus;

    public function __construct()
    {
        $this->databaseFunction = new DatabaseFunction();
        $this->resultOfSelectAllFoodOrder = $this->databaseFunction->selectAllFood_order();
        $this->resultOfSelectAllStatus = $this->databaseFunction->selectAllStatus();
    }

    public function getResultOfSelectAllFoodOrder()
    {
        return $this->resultOfSelectAllFoodOrder;
    }

    public function getResultOfSelectAllStatus()
    {
        return $this->resultOfSelectAllStatus;
    }
}
