<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Genres</h1>

<p>Remplir ce formulaire pour ajouter un nouveau genre</p>

<div class="formulaireG">

    <h3>GENRES</h3>

    <form action="index.php?action=addGenre" method="post">                                     <!-- Pour ajouter un nouveau Genre -->
            
        <input class="nameGenre" type="text" name="type" value="Nouveau" required>                              <!-- Champs de texte de saisie -->             
        
        <input class="add" type="submit" name="addGenre" value="AJOUTER">                       <!-- Bouton pour envoyer la demande -->

    </form>

    <form action="index.php?action=delGenre" method="post">                         

        <select class="nameGenre" name="id_genre" required>                                               
            <option selected>Genres</option> 
                
            <?php
                while ($genre = $genres->fetch()){                                             // Utilisaion d'un fetch() pour que les Genres soient dans la liste
                    echo "<option value=".$genre['id_genre'].">".$genre['type']."</option>";   // La value permet de récupérer l'id_genre et d'afficher le nom du genre (type)
                }
            ?>

        </select>
        
        <input class="add" type="submit" name="delGenre" value="SUPPRIMER">           

    </form>

</div>

<a class ="detailR" href="index.php?action=listGenres">Retour</a>                                                  <!-- Pour revenir à la page d'accueil -->

<?php

    $title = "Formulaire Genre";
    $content = ob_get_clean();                                                                  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

