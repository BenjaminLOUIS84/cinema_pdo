<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="list">

    <div class="titreGenre">
        <?php
            
            $genre = $genres->fetch();
            //echo $genre["type"];
            //echo "<br>";
        ?>
    </div> 

    <?php
        
        ?>
        <!-- Pour afficher le premier film créer un lien sur le titre de film dans le genre afin d'accéder au film -->

        <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$genre['id_film']?>">
            <h2><?=$genre["titre"]?></h2>    
        </a> 

        <?php

        while ($genre = $genres->fetch()){

            ?>
            
            <a class="detail" href="index.php?action=detailMovie&idFilm=<?=$genre['id_film']?>">
                <h2><?=$genre["titre"]?></h2>    
            </a> 

            <?php
        }
    ?>

    <a class ="detail" href="index.php?action=listGenres">Retour</a>

</div>

<?php

    $title = "Détail du Genre";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>