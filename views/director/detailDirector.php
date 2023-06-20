<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listR">
    <?php

        $realisateur = $realisateurs->fetch();

        // var_dump($realisateur);  Pour vérifier si on récupère les ID

        echo $realisateur["prenom"]." ";
        echo $realisateur["nom"]." ";
        echo "est de sexe ".$realisateur["sexe"]."<br>";
        echo "Date de naissance le ".$realisateur["date_nais"]."<br>";
        echo "<br>";
        echo "<img src='./public/images/{$realisateur["portrait"]}'>"."<br>";
    ?>

    <a class ="filmo" href="index.php?action=filmographyDirector&idDirector=<?=$realisateur['id_realisateur']?>">
        <h2>Filmographie</h2>
    </a>
    
    <!-- Bouton pour afficher la view updateRole -->

    <a class ="form" href="index.php?action=updateDirector&idDirector=<?=$realisateur['id_realisateur']?>">MODIFIER</a> 

    <a class ="detail" href="index.php?action=listDirectors">Retour</a>

</div>



<?php
    $title = "Détail du réalisateur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>
