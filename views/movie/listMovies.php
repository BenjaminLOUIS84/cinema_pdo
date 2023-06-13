<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Les Films</h1>

<!-- <?= $films->rowCount() ?> Fonction pour compter le nombre de films-->

<?php

    while ($film = $films->fetch()){

        // echo $film["id_film"]." ";
        // echo $film["titre"]."<br>";

        ?>
        <!-- on contacte index.php (fichier appelé), 
        on lui fournit 2 paramètres (action et idFilm) qui sont des pairs clef/valeur
        et qui seront récupérables en GET (superglobale $_GET de PHP, un tableau associatif (clef/valeur)).
        La valeur de action sera "detailMovie" et celle de idFilm sera par exemple "1" -->
        
        <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$film['id_film']?>">
            <h2><?=$film["titre"]?></h2>
        </a>
        <?php
    }

?>

<!-- Bouton pour afficher la view formulaireMovie -->

<a class ="Form" href="index.php?action=formulaireMovie">AJOUTER</a>

<?php
    $title = "Liste des Films";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>