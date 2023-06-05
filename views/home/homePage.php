<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Accueil</h2>

<figure>
    <img class= logo src="images/accueil.jpg" alt="symbole cinema">
</figure>

<?php

$title = "Page d'accueil";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>