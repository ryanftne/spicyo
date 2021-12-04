<?php

require __DIR__ . '/../database/DatabaseFunction.php';

class ProfileController
{
    private $databaseFunction;
    private $userInfos;
    private $foodOrder;

    public function __construct()
    {
        $this->databaseFunction = new DatabaseFunction();
        $this->userInfos = $this->databaseFunction->selectUser($_SESSION["id"]);
        $this->foodOrder = $this->databaseFunction->selectFood_order($_SESSION["id"]);
    }

    public function getUserInfos()
    {
        return $this->userInfos;
    }

    public function getFoodOrder()
    {
        return $this->foodOrder;
    }
}
