<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les Réalisateurs</h2>

<?php

$title = "Liste de réalisateurs";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>