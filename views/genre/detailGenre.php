<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Détails</h1>

<div class="list">

    <?php
        $genre = $genres->fetch();
        echo $genre["type"];
        echo "<br>";
    ?>

        <div class="titreGenre">
            <?php
            echo $genre["titre"]."<br>"; // Pour afficher le premier film du genre
            ?>
        </div> 

    <?php

        while ($genre = $genres->fetch()){

            //echo $genre["titre"]."<br>"; // Pour afficher les autres films du genre
            echo $genre["titre"]."<br>"; // Pour afficher les autres films du genre

            ?>
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