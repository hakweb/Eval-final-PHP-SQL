<?php  ob_start();?>

<form method="POST" action="<?= URL ?>cars/gvalid">
  <div class="form-group">
    <label for="title">Titre du jeu</label>
    <input type="text" name="title" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="nbPlayers">Nombres de joueurs</label>
    <input type="text" name="nbPlayers" class="form-control" id="nb_players">
  </div>
  <button class="btn btn-success" type="submit">Ajouter un jeu</button>
</form>

<?php

$content =ob_get_clean();
$title = "Ajouter un Véhicule";
require_once "base.html.php";

?>