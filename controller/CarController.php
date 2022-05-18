<?php

require_once "./modele/CarManager.php";
class CarController {
    private $carManager;


    public function __construct(){
        $this->carManager = new CarManager();
        $this->carManager->loadCars();        
    }

    public function displayCars(){
        $cars = $this->carManager->getCars();
        require_once "./view/cars.view.php";
    }

    public function newCarForm(){
        require_once "./view/new.car.view.php";
    }

    public function newCarValidation(){
      $this->carManager->newCarDB($_POST['nom'],$_POST['prenom']);
      header('Location:' . URL . "vehicule" );
   
    }

    public function editCarForm($id){
            echo $id;
    }

}


  


