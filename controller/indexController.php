<?php

require __DIR__ . '/../database/DatabaseFunction.php';

class IndexController
{
    private $databaseFunction;
    private $resultOfSelectAllMenu;
    private $resultOfSelectAllChicha;

    public function __construct()
    {
        $this->databaseFunction = new DatabaseFunction();
        $this->resultOfSelectAllMenu = $this->databaseFunction->selectAllMenu();
        $this->resultOfSelectAllChicha = $this->databaseFunction->selectAllChicha();
    }

    public function getResultOfSelectAllMenu()
    {
        return $this->resultOfSelectAllMenu;
    }

    public function getResultOfSelectAllChicha()
    {
        return $this->resultOfSelectAllChicha;
    }
}
