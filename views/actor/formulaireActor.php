<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Acteurs</h1>

<h2>Remplir ce formulaire pour supprimer ou ajouter un nouvel acteur à la base SQL</h2>

<div class="formulaire">

    <div class="formAdd">

        <h3>REALISATEURS</h3>

        <form action = "index.php?action=addActor" method = "post">

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
                <input class="add" type = "submit" name = "addActor" value = "AJOUTER">
            </p>

        </form><br>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <form action = "index.php?action=delActor" method = "post">                         

            <p>
                <select class="nameR" type = "text" name = "id_acteur" required>                                               
                    <option selected>Acteurs</option> 
        
                    <?php                                                                       // Avec le type <select><option> les réalisateurs sont dans une liste déroulante
                        while ($acteur = $acteurs->fetch()){                          // Utilisaion d'un fetch() pour que les réalisateurs soient dans la liste

                            echo "<option value =".$acteur['id_acteur'].">
                            ".$acteur['prenom']." ".$acteur['nom']."</option>";       // La value permet de récupérer l'id_realisateur et d'afficher le nom et le prénom d'un réalisateur
                        }           
                    ?>
                </select>
            </p> 

            <p>
                <input class="add" type = "submit" name = "delActor" value = "SUPPRIMER">           
            </p>

        </form>

    </div>

</div>

<a class ="detail" href="index.php">Retour</a>

<?php

    $title = "Formulaire Acteur";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

