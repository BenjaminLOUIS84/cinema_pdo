<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listR">
    <?php

        $realisateur = $realisateurs->fetch();

        echo $realisateur["prenom"]." ";
        echo $realisateur["nom"]." ";
        echo "est de sexe ".$realisateur["sexe"]."<br>";
        echo "Date de naissance le ".$realisateur["date_nais"]."<br>";
        echo "<br>";
        echo $realisateur["portrait"]."<br>";
    ?>

    <a class ="filmo" href="index.php?action=filmographyDirector">Fimographie</a>
    <a class ="detail" href="index.php?action=listDirectors">Retour</a>

</div>

<?php
    $title = "Détail du réalisateur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>

<!-- &idDirect=<?=$realisateur['id_realisateur']?> -->