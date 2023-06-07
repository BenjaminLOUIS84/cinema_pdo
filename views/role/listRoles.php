<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Les Rôles</h1>

<?php

    while ($role = $roles->fetch()){

        // echo $role["role_acteur"]." ";
        // echo $role["nom"]." ";
        // echo $role["prenom"]." ";
        // echo $role["pseudo"]."<br>";
        ?>
        <a class="detail" href="index.php?action=detailRole&idRole=<?=$role['role_acteur']?>">
            <h2><?=$role["prenom"]?></h2>
            <h2><?=$role["nom"]?></h2>
            <h2><?=$role["pseudo"]?></h2>
        </a>
        <?php
    }

?>

<?php
    $title = "Liste des rôles";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>