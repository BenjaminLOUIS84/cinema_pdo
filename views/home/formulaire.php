<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire</h1>

<h2>Remplir ce formulaire pour modifier la base SQL</h2>

<div class="formulaire">


    <form action = "#" method = "post">

        <p>
            <label>
                Ajouter un genre de film <br>
                <input class="nameGenre" type = "text" name = "nameGenre" required>
            </label>
        </p>
       
        <p>
            <input class="addGenre" type = "submit" name = "addGenre" value = "AJOUTER">
        </p>

    </form>

</div>

<?php

   

?>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>