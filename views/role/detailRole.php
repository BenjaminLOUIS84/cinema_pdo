<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listRO">

    <?php

        $role = $roles->fetch();

        echo $role["perso"]."<br>";
        echo "<br>";
        echo " Ce rôle est interprété par ";
        echo $role["prenom"]." ";                                                   
        echo $role["nom"]." "."dans<br>";
        
        //echo "dans le film: ".$role["titre"]."<br>";
    ?>

    <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$role['id_film']?>">
        <h2><?=$role["titre"]?></h2>    
    </a> 



    <a class ="detail" href="index.php?action=listRoles">Retour</a>

</div>

<?php
    $title = "Détail du role";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>