<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Distribution</h1>

<?php
    $acteur = $acteurs->fetch();
?>

<div class="role">       
    <a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
        <h2><?=$acteur["prenom"]?></h2>
        <h2><?=$acteur["nom"]?></h2>
    </a>

    <p>joue le rôle de</p>

    <a class="detail" href="index.php?action=detailRole&idRole=<?=$acteur['role_acteur']?>">
        <h2><?=$acteur["firstname"]?></h2>
        <h2><?=$acteur["name"]?></h2>
        <h2><?=$acteur["pseudo"]?></h2>
    </a> 
</div>

<?php
    
    while ($acteur = $acteurs->fetch()){

        ?>  
            <div class="role">
                <a class="detail" href="index.php?action=detailActor&idActor=<?=$acteur['id_acteur']?>">
                    <h2><?=$acteur["prenom"]?></h2>
                    <h2><?=$acteur["nom"]?></h2>    
                </a>

                <p>joue le rôle de</p>

                <a class="detail" href="index.php?action=detailRole&idRole=<?=$acteur['role_acteur']?>">
                    <h2><?=$acteur["firstname"]?></h2>
                    <h2><?=$acteur["name"]?></h2>
                    <h2><?=$acteur["pseudo"]?></h2>
                </a>
            </div>
            
        <?php
    }

?>

<a class ="detail" href="index.php?action=listMovies">Retour</a>

<!-- <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$acteur['id_film']?>">Retour</a> -->

<?php
    $title = "Distribution";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>