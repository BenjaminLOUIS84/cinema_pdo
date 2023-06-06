<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<div class="list">
<?php

$role = $roles->fetch();

echo " Ce rôle est interprété par ";
echo $role["prenom"]." ";
echo $role["nom"]." ";




?>
<a class ="detail" href="index.php?action=listRoles">Retour</a>
</div>
<?php

$title = "Détail du role";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>