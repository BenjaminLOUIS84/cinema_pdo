<?php
    // Démarrer la temporisation de sortie
    ob_start();

    //Pour parcourir le tableau de session de la page de FormulaireController on appel la fonction ici
    //session_start();
?>

<h1>Formulaire Films</h1>

<h2>Remplir ce formulaire pour ajouter un nouveau film dans la base SQL</h2>

<div class="formulaire">

    <form action = "index.php?action=addMovie" method = "post">                         <!-- Le formulaire doit déclencher l'action de la fonction addMovie() -->

        <p>
            <label>
                Titre <br>                                                              <!-- input (champs de saisi de texte) -->
                <input class="name" type = "text" name = "titre" required>              <!-- Le name de cet input doit correspondre à la variable $titre -->
            </label>
        </p> 
        <p>
            <label>
                Année de Sortie <br>                                                    <!-- input (champs de saisi de numérique ) -->
                <input class="name" type = "int" name = "annee_sortie" required>        <!-- Le name de l'input doit correspondre à la variable $annee_sortie -->
            </label>
        </p> 
        <p>
            <label>
                Durée <br>                                                          
                <input class="name" type = "int" name = "duree" required>          
            </label>
        </p> 
        <p>
            <label>
                Synopsis <br>                                                          
                <input class="name" type = "text" name = "synopsis" required>          
            </label>
        </p> 
        <p>
            <label>
                Note <br>                                                          
                <input class="name" type = "int" name = "note" required>          
            </label>
        </p>

        <div class="directorForm">
            
            <!-- <h3>Réalisateur</h3> -->
            <p>
                <label>                                                                     <!-- Lier les réalisateurs aux films Ajouter l'input pour saisir le réalisateur-->
                    <!-- Nom <br>                                                           -->
                    <!-- <input class="name" type = "text" name = "nom" required>           -->
                </label>
                <label>                                                                     
                    <!-- Prénom <br>                                                           -->
                    <!-- <input class="name" type = "text" name = "prenom" required>           -->
                </label>
            </p>
        </div>

        <p>                                                                             <!-- Bouton pour envoyer la demande au MovieController -->
            <input class="add" type = "submit" name = "addMovie" value = "AJOUTER">     <!-- Le name de l'input doit correspondre à la fonction  addMovie() -->
        </p>

    </form>

</div>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire Movie";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

