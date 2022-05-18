<?php
define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
"://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

require_once "controller/CarController.php";
$carController = new CarController();

if(empty($_GET['page'])){
    require_once "view/home.view.php";
}else{
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL) );
    switch ($url[0]) {
        case 'accueil': require_once "./view/home.view.php";
        break;
        
        case 'vehicule': 
        
            if(empty($url[1])){
                $carController->displayCars();
            }elseif($url[1] == "add"){
                $carController->newCarForm();
            }elseif($url[1] == "cvalid"){
                $carController->newCarValidation();
            }elseif($url[1] == "edit"){
                $carController->editCarForm($url[2]); 
            }elseif($url[1] == "delete"){
                // echo "Supprimer un vehicule";
            }
        break;
        case 'vehicule': require_once "./view/cars.view.php";


        case 'conducteur': 
         
            if(empty($url[1])){
                $driverController->displayDrivers();
            }elseif($url[1] == "add"){
                $driverController->newDriverForm();
            }elseif($url[1] == "conducteurvalid"){
                $driverController->newDriverValidation();
            }elseif($url[1] == "edit"){
                $driverController->editDriverForm($url[3]); 
            }elseif($url[1] == "delete"){
                // echo "Supprimer un conducteur";
            }
        break;

        
        case 'conducteur':  require_once "./view/driver.view.php";
        break;
    }
}

