<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Les Genres</h1>

<?php

    while ($genre = $genres->fetch()){

        // echo $genre["genre_film"]." ";
        // echo $genre["type"]."<br>";
        ?>

        <a class="detail" href="index.php?action=detailGenre&idGenre=<?=$genre['id_genre']?>">
            <h2><?=$genre["type"]?></h2>    
        </a>

        <?php
    }

?>

<!-- Bouton pour afficher la view formulaireGenre -->

<a class ="form" href="index.php?action=formulaireGenre">AJOUTER</a>

<?php

    $title = "Liste des genres";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>