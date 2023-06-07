<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<div class="listRO">
<?php

$role = $roles->fetch();

echo $role["perso"]."<br>";
echo "<br>";
echo " Ce rôle est interprété par ";

//////////////////////////////////////////////////////////////////////////////
echo $role["prenom"]." ";                                                   //Pourquoi le nom et prenom d'une autre table s'affiche
echo $role["nom"]."<br>";
//////////////////////////////////////////////////////////////////////////////

echo "dans le film: ";

//////////////////////////////////////////////////////////////////////////////
//echo $film["titre"];                                                      //Comment afficher la valeur d'un champ d'une autre table
//////////////////////////////////////////////////////////////////////////////




?>
<a class ="detail" href="index.php?action=listRoles">Retour</a>
</div>
<?php

$title = "Détail du role";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>