<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Filmographie</h1>

<div class="listR">
    <?php

        $realisateur = $realisateurs->fetch();

        // Gérer l'affichage en cas d'erreur
        if (!isset($realisateur['id_film'])) {
            
            echo "Aucuns films trouvés";

        } else {
        
            ?>
                <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$realisateur['id_film']?>">
                    <h2><?=$realisateur["titre"]?></h2>   
                </a>
            <?php

            while ($realisateur = $realisateurs->fetch()){

                ?>
                    <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$realisateur['id_film']?>">
                        <h2><?=$realisateur["titre"]?></h2>   
                    </a> 
                <?php

                // echo "<img src='./public/images/{$film['affiche']}'>";
            }
        }
    ?>

    <a class ="detailR" href="index.php?action=listDirectors">Retour</a>

</div>

<?php
    $title = "Filmographie du réalisateur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>