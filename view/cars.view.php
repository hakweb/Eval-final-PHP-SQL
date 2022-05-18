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
            <td><?= $game->getMarque()?></td>
            <td><?= $game->getModele()?></td>
            <td><?= $game->getCouleur()?></td>
            <td><?= $game->getImmatriculation()?></td>
            <td><a href="<?= URL ?>cars/edit/<?= $car->getId() ?>"><i class="fas fa-edit"></i></a></td>
            <td>

        
  
        </tr>
     <?php endforeach; ?>   

  </tbody>
</table>

<a class="btn btn-success w-25 d-block m-auto" href="<?= URL ?>vehicule/add">Ajouter un vehicule</a>

<?php

$content =ob_get_clean();
$title = "Welcome To VTC_13";
require_once "base.html.php";

?>


