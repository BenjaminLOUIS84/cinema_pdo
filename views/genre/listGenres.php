<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h1>Les Genres</h1>

<?php
while ($genre = $genres->fetch()){

    echo $genre["genre_film"]." ";

    echo $genre["type"]."<br>";

    
    ?>
    <!-- <a href="index.php?action=detailFilm&id=<?$genre['id_film']?>">Détail Film</a> -->
    <?php
}

?>


<?php

$title = "Liste des genres";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>