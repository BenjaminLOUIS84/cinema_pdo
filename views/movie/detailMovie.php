<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<!-- ///////////////////////////////////////////////////////////////////AFFICHER LE DETAIL DU FILM////////////////////////////////////////////////////////////////// -->
    
<div class="listM">
    <?php

        $film = $films->fetch();

        echo $film["titre"]." ";
        echo " - Sortie en ".$film["annee_sortie"]." ";
        echo " - Durée: ".$film["duree"]." minutes<br>";

        // En modifiant la requête SQL de MovieController on peut ajouter le réalisateur 
        // echo "Réalisé par: ".$film["prenom"]." ".$film["nom"]."<br>";  //Pour juste afficher chaques Réalisateurs  
        // echo "<br>";
    ?>
    
    <!-- on contacte index.php (fichier appelé), on lui fournit 2 paramètres (action et idDirector)
    qui sont des pairs clef/valeur et qui seront récupérables en GET (superglobale $_GET de PHP, un tableau associatif (clef/valeur)).
    La valeur de action sera "detailDirector" et celle de idDirector sera par exemple "1" 
    Pour afficher et accéder aux Réalisateurs de chaques films il faut rajouter dans la requête SQL id_realisateur.
    Il faut garder la même variable $film et mettre la valeur ajoutée précédement.
    Pour rendre le nom du réalisateur cliquable, intégrer l'echo ci dessus dans une requête HTML-->
    
    <a class="detail" href="index.php?action=detailDirector&idDirector=<?=$film["id_realisateur"]?>"> 
        <h2>Réaliser par <?=$film["prenom"]?></h2>
        <h2><?=$film["nom"]?></h2>
    </a> 

    <?php

        echo "<br>";
        //echo $film["affiche"]."<br>";//Pour afficher la même image dans tous les films
        echo "<img src='./public/images/{$film['affiche']}'>";//Pour afficher les images de chaque films 
        echo "Note: ".$film["note"]." /10<br>";
        echo "<br>";
        echo "SYNOPSIS<br>";
        echo $film["synopsis"]."<br>";
        echo "<br>";   
    ?>

    <!-- ///////////////////////////////////////////////////////////////////AFFICHER LA DISTRIBUTION////////////////////////////////////////////////////////////////// -->
    
    <h2>DISTRIBUTION</h2>

    <?php
        $acteur = $acteurs->fetch();
    ?>

    <div class="role">       
        <a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
            <h2><?=$acteur["prenom"]?></h2>
            <h2><?=$acteur["nom"]?></h2>
        </a>

        <p>joue le rôle de</p>

        <a class="detail" href="index.php?action=detailRole&idRole=<?=$acteur['role_acteur']?>">
            <h2><?=$acteur["firstname"]?></h2>
            <h2><?=$acteur["name"]?></h2>
            <h2><?=$acteur["pseudo"]?></h2>
        </a> 
    </div>

    <?php
        while ($acteur = $acteurs->fetch()){
            ?>  
                <div class="role">
                    <a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
                        <h2><?=$acteur["prenom"]?></h2>
                        <h2><?=$acteur["nom"]?></h2>    
                    </a>

                    <p>joue le rôle de</p>

                    <a class="detail" href="index.php?action=detailRole&idRole=<?=$acteur['role_acteur']?>">
                        <h2><?=$acteur["firstname"]?></h2>
                        <h2><?=$acteur["name"]?></h2>
                        <h2><?=$acteur["pseudo"]?></h2>
                    </a>
                </div>
            <?php
        }
    ?>
    <!-- ///////////////////////////////////////////////////////////////////AFFICHER LE GENRE////////////////////////////////////////////////////////////////// -->
    
    <h2>GENRE</h2>

    <div class="list">

        <?php
            while ($genre = $genres->fetch()){
                ?>
                <a class="detail" href="index.php?action=detailGenre&idGenre=<?=$genre['genre_film']?>">
                    <h2><?=$genre["type"]?></h2>    
                </a>
                <?php
            }
        ?>
    </div>

</div>

<!--Requête CI DESSOUS pour revenir à la liste des films  -->
<a class ="detail" href="index.php?action=listMovies">Retour</a>

<?php
    $title = "Détail du Film";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>