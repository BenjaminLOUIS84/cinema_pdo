<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<!-- <div class="home"> -->
<h1>Accueil</h1>

<figure>
    <img class= logo src="public/images/accueil.jpg" alt="symbole cinema">
</figure>

<!-- </div> -->

<?php

$title = "Page d'accueil";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>