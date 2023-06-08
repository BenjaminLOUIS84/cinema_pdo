<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Filmographie</h1>

<div class="listR">
    <?php

        $realisateur = $realisateurs->fetch();

        echo $realisateur["titre"]."<br>";
        
        //      ?>
        <!-- //     <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$realisateur['id_film']?>">
        //         <h2><?=$realisateur["titre"]?></h2>   
        //     </a> -->
                <?php

        // while ($realisateur = $realisateurs->fetch()){

        //     ?>
        <!-- //         <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$realisateur['id_film']?>">
        //             <h2><?=$realisateur["titre"]?></h2>   
        //         </a> -->
                <?php
        // }
    ?>

    <a class ="detail" href="index.php?action=listDirectors">Retour</a>

</div>

<?php
    $title = "Filmographie du réalisateur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>