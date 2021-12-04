<?php
require __DIR__ . '/../database/DatabaseFunction.php';

class CartController
{
    private $databaseFunction;
    private $resultOfPanier;

    public function __construct()
    {
        $this->databaseFunction = new DatabaseFunction();
        $this->setResultPanier($this->databaseFunction->selectPanier($_SESSION["id"]));
    }

    public function setResultPanier($selectedPanier)
    {
        if (empty($selectedPanier)) {
            $this->resultOfPanier = "Votre panier est vide";
            return $this->resultOfPanier;
        } else {

            $panierMenu = $this->databaseFunction->selectPanier_menu($selectedPanier["panier"]);
            // $panier = [];
            $panier = [];
            for ($i = 0; $i < sizeof($panierMenu); $i++) {
                array_push($panier, $arr = [$panierMenu[$i]["id"] => $this->databaseFunction->selectMenu($panierMenu[$i]["menu_id"])]);
            }
            $this->resultOfPanier = $panier;

            // for ($i = 0; $i < sizeof($panierMenu); $i++) {
            //     array_push($panier, $this->databaseFunction->selectMenu($panierMenu[$i]["menu_id"]));
            // }

            // $this->resultOfPanier = $panier;


            return $this->resultOfPanier;
        }
    }

    public function getResultOfSelectPanier()
    {
        return $this->resultOfPanier;
    }
}
