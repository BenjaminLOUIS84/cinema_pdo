<?php
// Démarrer la temporisation de sortie
ob_start();

?>

<h1>Les Acteurs</h1>

<?php
while ($acteur = $acteurs->fetch()){

    //echo $acteur["id_acteur"]." ";
    //echo $acteur["prenom"]." ";
    //echo $acteur["nom"]."<br>";
    
    ?>

    
    <a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
        
        <h2><?=$acteur["prenom"]?></h2>
        <h2><?=$acteur["nom"]?></h2>
            
    </a>
    

    <?php
}

?>

<?php

$title = "Liste des acteurs";
$content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
require "views/template.php";

?>