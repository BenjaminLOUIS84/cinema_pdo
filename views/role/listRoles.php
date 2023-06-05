<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les Rôles</h2>

<?php
while ($role = $roles->fetch()){

    echo $role["role_acteur"]." ";
    echo $role["nom"]." ";
    echo $role["prenom"]." ";
    echo $role["pseudo"]."<br>";

    
    ?>
    <!-- <a href="index.php?action=detailFilm&id=<?$role['id_film']?>">Détail Film</a> -->
    <?php
}

?>

<?php

$title = "Liste des rôles";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>