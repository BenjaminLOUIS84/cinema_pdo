<?php
    // Démarrer la temporisation de sortie
    ob_start();

    //Pour parcourir le tableau de session de la page de FormulaireController on appel la fonction ici
    //session_start();
?>

<h1>Formulaire Genres</h1>

<h2>Remplir ce formulaire pour ajouter un nouveau genre la base SQL</h2>

<div class="formulaire">

    <h3>GENRES</h3>

    <form action = "index.php?action=addGenre" method = "post">

        <p>
            <label>
                <input class="nameGenre" type = "text" name = "type" required>
            </label>
        </p> 

        <p>
            <input class="add" type = "submit" name = "addGenre" value = "AJOUTER">
        </p>

    </form>

</div>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire Genre";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

