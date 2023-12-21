<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Filmographie</h1>

<div class="listR">
    <?php

        $acteur = $acteurs->fetch();
        
        // Gérer l'affichage en cas d'erreur
        if (!isset($acteur['id_film'])) {
            
            echo "Aucuns films trouvé";

        } else {
            
            
            ?>
                <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$acteur['id_film']?>">
                    <h2><?=$acteur["titre"]?></h2>   
                </a>
            <?php

            while ($acteur = $acteurs->fetch()){

                ?>
                    <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$acteur['id_film']?>">
                        <h2><?=$acteur["titre"]?></h2>   
                    </a> 
                <?php
            }
        }
    ?>

    <a class ="detailR" href="index.php?action=listActors">Retour</a>

</div>

<?php
    $title = "Filmographie de l'acteur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>