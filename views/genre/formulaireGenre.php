<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Genres</h1>

<h2>Remplir ce formulaire pour supprimer ou ajouter un nouveau genre la base SQL</h2>

<div class="formulaire">

    <h3>GENRES</h3>

    <form action = "index.php?action=addGenre" method = "post">                         <!-- Pour ajouter un nouveau Genre -->

        <p>
            <label>
                <input class="nameGenre" type = "text" name = "type" required>          <!-- Champs de texte de saisie -->           
            </label>
        </p> 

        <p>
            <input class="add" type = "submit" name = "addGenre" value = "AJOUTER">     <!-- Bouton pour envoyer la demande -->
        </p>

    </form><br>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <form action = "index.php?action=delGenre" method = "post">                         

        <p>
        <select class="nameGenre" name = "type" required>                                               
            <option selected>Genre</option> 
                
            <?php
                while ($genre = $genres->fetch()){                                              // Utilisaion d'un fetch() pour que les Genres soient dans la liste

                    echo "<option value =".$genre['id_genre'].">".$genre['type']."</option>";   // La value permet de récupérer l'id_genre
                }
            ?>
        </select>
        </p> 

        <p>
            <input class="add" type = "submit" name = "delGenre" value = "SUPPRIMER">           
        </p>

    </form>

</div>

<a class ="detail" href="index.php">Retour</a>                                          <!-- Pour revenir à la page d'accueil -->

<?php

    $title = "Formulaire Genre";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

