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
                    Nom <br>
                    <input class="nameR" type = "text" name = "nom" required>
                </label>
                <label>
                    Prénom <br>
                    <input class="nameR" type = "text" name = "prenom" required>
                </label>
            </p>
            <p>
                <label>
                    Sexe <br>
                    <input class="nameR" type = "text" name = "sexe" required>
                </label>
                <label>
                    Date de naissance <br>
                    <input class="nameR" type = "date" name = "date_naissance" required>
                </label>
            </p>

            <p>
                <input class="add" type = "submit" name = "addDirector" value = "AJOUTER">
            </p>

        </form><br>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <form action = "index.php?action=delDirector" method = "post">                         

            <p>
                <select class="nameR" type = "text" name = "id_realisateur" required>                                               
                    <option selected>Réalisateurs</option> 
        
                    <?php
                        while ($realisateur = $realisateurs->fetch()){                                              // Utilisaion d'un fetch() pour que les Genres soient dans la liste

                            echo "<option value =".$realisateur['id_realisateur'].">".$realisateur['prenom']." ".$realisateur['nom']."</option>";   // La value permet de récupérer l'id_genre
                        }           
                    ?>
                </select>
            </p> 

            <p>
                <input class="add" type = "submit" name = "delDirector" value = "SUPPRIMER">           
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

