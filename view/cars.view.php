<?php ob_start(); ?>


<p>Accueil : Listing Vehicules</p>

<table class="table  table-hover text-center shadow">
  <thead class="bg-secondary ">
    <tr>
      <th scope="col">Marque</th>
      <th scope="col">Modele</th>
      <th scope="col">Couleur</th>
      <th scope="col">Immatriculation</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>

          <?php foreach( $cars as $car ) : ?>
        <tr>
            <td><?= $car->getMarque()?></td>
            <td><?= $car->getModele()?></td>
            <td><?= $car->getCouleur()?></td>
            <td><?= $car->getImmatriculation()?></td>
            <td><a href="<?= URL ?>cars/edit/<?= $car->getId() ?>"><i class="fas fa-edit"></i></a></td>
            <td><a href="<?= URL ?>cars/delete"><i class="fa-solid fa-trash"></i></a></td>
        </tr>

            <td>

        
  
        </tr>
     <?php endforeach; ?>   

  </tbody>
</table>

<a class="btn btn-success w-25 d-block m-auto" href="<?= URL ?>cars/add">Ajouter un vehicule</a>

<?php

$content =ob_get_clean();
$title = "Welcome To VTC_13";
require_once "base.html.php";

?>


