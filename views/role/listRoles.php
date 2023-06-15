<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Les Rôles</h1>

<?php

    while ($role = $roles->fetch()){
        
        ?>
        <a class="detail" href="index.php?action=detailRole&idRole=<?=$role['role_acteur']?>">
            <h2><?=$role["firstname"]?></h2>
            <h2><?=$role["name"]?></h2>
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