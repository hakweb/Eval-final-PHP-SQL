<?php 
require_once "./modele/DriverManager.php";
$driverManager = new DriverManager();
$driverManager->loaddrivers();
$drivers = $driverManager->getDrivers();

ob_start(); ?>

<p>Accueil : Listing Vehicules</p>

<table class="table  table-hover text-center shadow">
  <thead class="bg-secondary text-white">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>

          <?php foreach( $drivers as $driver ) : ?>
        <tr>
            <td><?= $driver->getNom()?></td>
            <td><?= $driver->getPrenom()?></td>

            <td><a href=""><i class="fa-solid fa-edit"></i></a></td>
          <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
        </tr>


            <td>

        
  
        </tr>
     <?php endforeach; ?>   

  </tbody>
</table>

<a class="btn btn-success w-25 d-block m-auto" href="<?= URL ?>drivers/add">Ajouter un jeu</a>

<?php

$content =ob_get_clean();
$title = "Welcome To VTC_13";
require_once "base.html.php";

?>
