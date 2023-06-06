<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<div class="list">
<?php

$film = $films->fetch();

echo $film["titre"]." ";
echo " - Sortie en ".$film["annee_sortie"]." ";
echo " - Durée: ".$film["duree"]." minutes<br>";

echo $film["affiche"]."<br>";

echo "Note: ".$film["note"]." /10<br>";
echo "<br>";
echo "SYNOPSIS<br>";
echo $film["synopsis"]."<br>";

?>
<a class ="detail" href="index.php?action=listMovies">Retour</a>
</div>
<?php

$title = "Détail du Film";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>