<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listRO">

    <?php

        $acteur = $acteurs->fetch();

        echo "<img src='./public/images/{$acteur['perso']}'>";
        echo "<br>";
        echo $acteur["firstname"]." ";                                                   
        echo $acteur["name"]." ";
        echo $acteur["pseudo"]." ";

        echo "est interprété par <br>";
    
    ?>

    <a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
        <h2><?=$acteur["prenom"]?></h2>  
        <h2><?=$acteur["nom"]?></h2>    
    </a>

    <?php

        echo "dans<br>";

        //echo $acteur["titre"]."<br>";
    ?>

    <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$acteur['id_film']?>">
        <h2><?=$acteur["titre"]?></h2>    
    </a> 



    <a class ="detail" href="index.php?action=listRoles">Retour</a>

</div>

<?php
    $title = "Détail du role";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>