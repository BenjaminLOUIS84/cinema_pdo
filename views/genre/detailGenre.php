<?php
// Démarrer la temporisation de sortie
ob_start();
?>

<h1>Détails</h1>

<div class="list">
<?php

$genre = $genres->fetch();
echo $genre["type"];
echo "<br>";
echo $genre["titre"]."<br>";


while ($genre = $genres->fetch()){

    echo $genre["titre"]."<br>";
}

?>
<a class ="detail" href="index.php?action=listGenres">Retour</a>

</div>

<?php

$title = "Détail du Genre";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>