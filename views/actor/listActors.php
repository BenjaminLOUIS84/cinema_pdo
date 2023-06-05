<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les Acteurs</h2>

<?php

$title = "Liste d'acteurs";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>