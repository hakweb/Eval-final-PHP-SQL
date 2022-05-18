<?php ob_start(); ?>


<p>Accueil : Listing Vehicules</p>

<table class="table  table-hover text-center shadow">
  <thead class="bg-secondary text-white">
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Nombres de voitures</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>

          <?php foreach( $cars as $car ) : ?>
        <tr>
            <td><?= $game->getTom()?></td>
            <td><?= $game->getNbPrenom()?></td>
            <td><a href="<?= URL ?>games/edit/<?= $car->getId() ?>"><i class="fas fa-edit"></i></a></td>
            <td>

        
  
        </tr>
     <?php endforeach; ?>   

  </tbody>
</table>

<a class="btn btn-success w-25 d-block m-auto" href="<?= URL ?>cars/add">Ajouter un jeu</a>

<?php

$content =ob_get_clean();
$title = "Welcome To VTC_13";
require_once "base.html.php";

?>
