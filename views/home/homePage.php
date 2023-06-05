<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Ceci est une page d'accueil</h2>

<?php

$title = "Page d'accueil";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>