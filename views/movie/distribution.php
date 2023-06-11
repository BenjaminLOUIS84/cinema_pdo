<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Distribution</h1>

<?php
    $acteur = $acteurs->fetch();
?>
        
<a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
    <h2><?=$acteur["prenom"]?></h2>
    <h2><?=$acteur["nom"]?></h2>    
</a>

<?php
    

?>

<?php
    $title = "Distribution";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>