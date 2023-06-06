<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<?php

$film = $films->fetch();

echo $film["titre"]." ";
echo " - Sortie en ".$film["annee_sortie"]." ";
echo " - Durée: ".$film["duree"]." minutes<br>";

?>

<?php

echo "SYNOPSIS: ".$film["synopsis"]."<br>";

?>

<a class ="detail" href="index.php?action=listMovies">Retour</a>

<?php


?>
<?php

$title = "Détail du Film";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>