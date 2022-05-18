<?php  ob_start(); ?>

<p>Bienvenue sur notre Site !</p>


<?php

$content =ob_get_clean();
$title = "Bienvenue chez VTC_Marseille";
require_once "base.html.php";

?>