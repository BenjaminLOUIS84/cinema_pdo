<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="listRO">

    <?php

        $role = $roles->fetch();

        echo "<img src='./public/images/{$role['perso']}'>";
        echo "<br>";
        echo $role["firstname"]." ";                                                   
        echo $role["name"]." ";
        echo $role["pseudo"]." ";

        echo "est interprété par <br>";
    
    ?>

    <a class="detail" href="index.php?action=detailActor&idActor=<?=$role['id_acteur']?>">
        <h2><?=$role["prenom"]?></h2>  
        <h2><?=$role["nom"]?></h2>    
    </a>

    <?php

        echo "dans<br>";

        //echo $acteur["titre"]."<br>";
    ?>

    <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$role['id_film']?>">
        <h2><?=$role["titre"]?></h2>    
    </a> 

    <!-- Bouton pour afficher la view updateRole -->

    <!-- <a class ="form" href="index.php?action=updateRole">MODIFIER</a> -->

    <a class ="form" href="index.php?action=updateRole&idRole=<?=$role['role_acteur']?>">MODIFIER</a>

    <a class ="detail" href="index.php?action=listRoles">Retour</a>

</div>

<?php
    $title = "Détail du role";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>