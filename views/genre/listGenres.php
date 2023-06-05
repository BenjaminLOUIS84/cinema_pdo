<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les genres de films</h2>

<?php
while ($genre = $genres->fetch()){

    echo $genre["genre_film"]." ";

    echo $genre["type"]."<br>";

    
    ?>
    <!-- <a href="index.php?action=detailFilm&id=<?$film['id_film']?>">Détail Film</a> -->
    <?php
}

?>


<?php

$title = "Liste des genres";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>