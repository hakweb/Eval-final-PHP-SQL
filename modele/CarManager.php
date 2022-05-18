<?php
 require_once "./modele/Manager.php";
 require_once "./modele/Car.php";

class CarManager extends Manager {

    private $cars;

    public function addCar($car){
        $this->cars[] = $car;
    }
    

    public function getCars(){
        return $this->cars;
    }

    public function getCarById($id){
        foreach($this->cars as $car) {
            if ($id == $car->getId()) {
                return $car;
            }
        }
    }

    public function loadCars(){
        $req = $this->getBdd()->prepare("SELECT * FROM vtc");
        $req->execute();
        $myCars = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myCars as $car){
            $g = new Car($car['id_vehicule'],$car['marque'],$car['modele'],$car['couleur'],$car['immatriculation']);
            $this->addCar($g);
        }

    }

    public function newCarDB($marque, $modele, $couleur, $immatriculation){
        $req = "INSERT INTO cars (marque, modele, couleur, immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":marque",$marque, PDO::PARAM_STR);
        $statement->bindValue(":modele",$modele, PDO::PARAM_STR);
        $statement->bindValue(":couleur",$couleur, PDO::PARAM_STR);
        $statement->bindValue(":immatriculation",$immatriculation, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $g = new Car($this->getBdd()->lastInsertId(),$marque,$modele,$couleur,$immatriculation);
            $this->addCar($g);
        }
        
    }

}