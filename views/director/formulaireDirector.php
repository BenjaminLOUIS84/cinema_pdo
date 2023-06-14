<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Réalisateurs</h1>

<h2>Remplir ce formulaire pour ajouter un nouveau réalisateur la base SQL</h2>

<div class="formulaire">

    <h3>REALISATEURS</h3>

    <!-- <form action = "index.php?action=addDirector" method = "post">

        <p>
            <label>
                <input class="nameGenre" type = "text" name = "type" required>
            </label>
        </p> 

        <p>
            <input class="add" type = "submit" name = "addGenre" value = "AJOUTER">
        </p>

    </form> -->

</div>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire Réalisateur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

