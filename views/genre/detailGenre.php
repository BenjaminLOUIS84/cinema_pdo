<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<div class="list">
<?php

$genre = $genres->fetch();
//$film = $films->fetch();

echo $genre["type"];
//echo $film["titre"];


?>
<a class ="detail" href="index.php?action=listGenres">Retour</a>
</div>
<?php

$title = "Détail du Film";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>