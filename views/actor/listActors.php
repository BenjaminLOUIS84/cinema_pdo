<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les Acteurs</h2>

<?php
while ($acteur = $acteurs->fetch()){

    echo $acteur["id_personne"]." ";
    echo $acteur["nom"]." ";
    echo $acteur["prenom"]." ";
    echo $acteur["sexe"]." ";
    echo $acteur["date_naissance"]."<br>";

    
    ?>
    <!-- <a href="index.php?action=detailFilm&id=<?$acteur['id_film']?>">Détail Film</a> -->
    <?php
}

?>

<?php

$title = "Liste d'acteurs";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>