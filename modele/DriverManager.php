<?php
 require_once "./modele/Manager.php";
 require_once "./modele/Driver.php";

class DriverManager extends Manager {

    private $drivers;

    public function addDriver($driver){
        $this->drivers[] = $driver;
    }

    public function getDrivers(){
        return $this->drivers;
    }

    public function loadDrivers(){
        $req = $this->getBdd()->prepare("SELECT * FROM drivers");
        $req->execute();
        $myDrivers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myDrivers as $driver){
            $u = new Driver ($driver['id'],$driver['prenom'],$driver['nom']);

            $this->addDriver($u);
        }

    }


}