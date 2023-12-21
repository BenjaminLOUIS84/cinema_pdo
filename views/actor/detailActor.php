<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listA">
    <?php

        $acteur = $acteurs->fetch();

        //var_dump($acteur);

        echo $acteur["prenom"]." ";
        echo $acteur["nom"]." ";
        echo "est de sexe ".$acteur["sexe"]."<br>";
        echo "Date de naissance le ".$acteur["date_nais"]."<br>";    //Changer le format de la date de naissance avec DATE_FORMAT(date_naissance, '%d-%m-%Y') AS date_nais
        //                                                              (dans PersonController)
        echo "<br>";
        // echo "<img src='./public/images/{$acteur["portrait"]}'>"."<br>";
        echo "<img src='./uploads/{$acteur["portrait"]}'>"."<br>";

    ?>

    <a class ="filmo" href="index.php?action=filmographyActor&idActor=<?=$acteur['id_acteur']?>">
        <h3>Filmographie</h3>
    </a>

    <!-- Bouton pour afficher la view updateActor -->

    <a class ="form" href="index.php?action=updateActor&idActor=<?=$acteur['id_acteur']?>">MODIFIER</a> 

    <a class ="detailR" href="index.php?action=listActors">Retour</a>

</div>

<?php
    $title = "Détail de l'acteur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>