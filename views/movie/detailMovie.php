<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listM">
    <?php

        $film = $films->fetch();

        echo $film["titre"]." ";
        echo " - Sortie en ".$film["annee_sortie"]." ";
        echo " - Durée: ".$film["duree"]." minutes<br>";
        //////////////////////////////////////////////////////////////////En modifiant la requête SQL de MovieController on peut ajouter le réalisateur 
        echo "Réalisé par: ".$film["prenom"]." ".$film["nom"]."<br>";     
        echo "<br>";
        //////////////////////////////////////////////////////////////////
        echo $film["affiche"]."<br>";

        //echo '<img src="public/images/film1.jpg" >'; Pour afficher la même image dans tous les films 
        //Pour afficher les affiches des films modifier les champs dans la colone affiche de la base SQL par la balise <img src="public/images/film1.jpg" >

        echo "Note: ".$film["note"]." /10<br>";
        echo "<br>";
        echo "SYNOPSIS<br>";
        echo $film["synopsis"]."<br>";
        echo "<br>";

        /////////////////////////////////////////////////////////////
        //echo "Distribution: ";                                     //Intégrer les acteurs
        /////////////////////////////////////////////////////////////

        //Requête pour revenir à la liste des films                     
    ?>

    <a class ="detail" href="index.php?action=listMovies">Retour</a>

</div>

<?php
    $title = "Détail du Film";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>