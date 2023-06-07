<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<div class="listA">
<?php

$acteur = $acteurs->fetch();

echo $acteur["prenom"]." ";
echo $acteur["nom"]." ";
echo "est de sexe ".$acteur["sexe"]."<br>";

//////////////////////////////////////////////////////////////////
echo "Date de naissance: ".$acteur["date_naissance"]."<br>";    //Changer le format de la date de naissance (dans PersonController)
//////////////////////////////////////////////////////////////////

echo "<br>";
echo $acteur["portrait"]."<br>";


?>
<a class ="detail" href="index.php?action=listActors">Retour</a>
</div>
<?php

$title = "Détail de l'auteur";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>