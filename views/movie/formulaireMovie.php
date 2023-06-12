<?php
    // Démarrer la temporisation de sortie
    ob_start();

    //Pour parcourir le tableau de session de la page de FormulaireController on appel la fonction ici
    //session_start();
?>

<h1>Formulaire Films</h1>

<h2>Remplir ce formulaire pour modifier la base SQL</h2>

<div class="formulaire">

    <form action = "index.php?action=ajouterFilm" method = "post">

        <p>
            <label>
                Ajouter un film <br>
                <input class="name" type = "text" name = "nameMovie" required>
            </label>
        </p> 

        <p>
            <input class="add" type = "submit" name = "addMovie" value = "AJOUTER">
        </p>

    </form>

</div>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire Movie";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

