<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Les Réalisateurs</h1>

<?php
    while ($realisateur = $realisateurs->fetch()){

        //echo $realisateur["id_realisateur"]." ";
        //echo $realisateur["nom"]." ";
        //echo $realisateur["prenom"]." ";

        ?>
        <a class="detail" href="index.php?action=detailDirector&idDirector=<?=$realisateur['id_realisateur']?>">
        <h2><?=$realisateur["prenom"]?></h2>
        <h2><?=$realisateur["nom"]?></h2>    
        </a>
        <?php
    }
?>

<!-- Bouton pour afficher la view formulaireDirector -->

<!-- <a class ="form" href="index.php?action=formulaireDirector">AJOUTER</a> -->


<?php
    $title = "Liste des réalisateurs";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>