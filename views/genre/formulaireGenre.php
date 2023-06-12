<?php
    // Démarrer la temporisation de sortie
    ob_start();

    //Pour parcourir le tableau de session de la page de FormulaireController on appel la fonction ici
    //session_start();
?>

<h1>Formulaire Genres</h1>

<h2>Remplir ce formulaire pour modifier la base SQL</h2>

<div class="formulaire">

    <form action = "#" method = "post">

        <p>
            <label>
                Ajouter un genre de film <br>
                <input class="name" type = "text" name = "nameGenre" required>
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
