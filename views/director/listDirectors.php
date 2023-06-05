<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Ceci est une liste de réalisateurs</h2>

<?php

$title = "Liste de réalisateurs";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>