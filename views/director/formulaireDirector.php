<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Réalisateurs</h1>

<h2>Remplir ce formulaire pour ajouter un nouveau réalisateur la base SQL</h2>

<div class="formulaire">

    <div class="formAdd">

        <h3>REALISATEURS</h3>

        <form action = "index.php?action=addDirector" method = "post">

            <p>
                <label>
                    <input class="nameGenre" type = "text" name = "nom" required>
                </label>
                <label>
                    <input class="nameGenre" type = "text" name = "prenom" required>
                </label>
            </p>
            <p>
                <label>
                    <input class="nameGenre" type = "text" name = "sexe" required>
                </label>
                <label>
                    <input class="nameGenre" type = "date" name = "date_naissance" required>
                </label>
            </p>

            <p>
                <input class="add" type = "submit" name = "addDirector" value = "AJOUTER">
            </p>

        </form>

    </div>

</div>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire Réalisateur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

