<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les Réalisateurs</h2>

<?php
while ($realisateur = $realisateurs->fetch()){

    echo $realisateur["id_realisateur"]." ";
    echo $realisateur["nom"]." ";
    echo $realisateur["prenom"]." ";
    echo $realisateur["sexe"]." ";
    echo $realisateur["date_naissance"]."<br>";

    
    ?>
    <!-- <a href="index.php?action=detailFilm&id=<?$realisateur['id_film']?>">Détail Film</a> -->
    <?php
}

?>

<?php

$title = "Liste de réalisateurs";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>