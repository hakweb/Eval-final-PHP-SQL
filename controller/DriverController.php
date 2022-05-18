<?php

require_once "./modele/DriverManager.php" ; 
class DriverController {
    private $driverManager;
    

    public function __construct(){
        $this->driverManager = new DriverManager();
        $this->driverManager->loadDrivers();        
    }

    public function displayDrivers(){
        $drivers = $this->driverManager->getDrivers();
        require_once "view/driver.view.php";
    }

    public function newDriverForm(){
        require_once "view/new.driver.view.php";
    }

    public function newDriverValidation(){
      $this->driverManager->newDriverDB($_POST['nom'],$_POST['prenom']);
      header('Location:' . URL . "conducteur" );
   
    }

    public function editDriverForm($id){
            echo $id;
    }

}