<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h2>Les Films</h2>



<!-- <?= $films->rowCount() ?> Pour compter le nombre de films-->


<!-- Je vais devoir fetchAll -->

<?php
while ($film = $films->fetch()){

    echo $film["id_film"]." ";

    echo $film["titre"]."<br>";

    //echo $film["synopsis"];
    ?>
    <!-- <a href="index.php?action=detailFilm&id=<?$film['id_film']?>">Détail Film</a> -->
    <?php
}

?>
<?php

$title = "Liste des Films";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>