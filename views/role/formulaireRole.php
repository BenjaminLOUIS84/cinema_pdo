<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Rôles</h1>

<h2>Remplir ce formulaire pour supprimer ou ajouter un nouveau rôle à la base SQL</h2>

<div class="formulaire">

    <div class="formAdd">
            
        <h3>ROLES</h3>

        <form action = "index.php?action=addRole" method = "post">                         <!-- Pour ajouter un nouveau Rôle -->

            <p>
                <label>
                    Prénom <br>
                    <input class="nameGenre" type = "text" name = "firstname" required>          <!-- Champs de texte de saisie -->           
                </label>
                <label>
                    Nom <br>
                    <input class="nameGenre" type = "text" name = "name" required>          <!-- Champs de texte de saisie -->           
                </label>
            </p> 
            <p>
                <label>
                    Pseudo <br>
                    <input class="nameGenre" type = "text" name = "pseudo" required>          <!-- Champs de texte de saisie -->           
                </label>
            </p> 

            <p>
                <input class="add" type = "submit" name = "addRole" value = "AJOUTER">     <!-- Bouton pour envoyer la demande -->
            </p>

        </form><br>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <form action = "index.php?action=delRole" method = "post">                         

            <p>
            <select class="nameGenre" name = "role_acteur" required>                                               
                <option selected>Rôles</option> 
                    
                <?php
                    while ($role = $roles->fetch()){                                              // Utilisaion d'un fetch() pour que les Rôles soient dans la liste

                        echo "<option value =".$role['role_acteur'].">".$role['firstname']." ".$role['name']." ".$role['pseudo']."</option>";   // La value permet de récupérer l'id role_acteur
                    }
                ?>
            </select>
            </p> 

            <p>
                <input class="add" type = "submit" name = "delRole" value = "SUPPRIMER">           
            </p>

        </form>

    </div>

</div>

<a class ="detail" href="index.php">Retour</a>                                          <!-- Pour revenir à la page d'accueil -->

<?php

    $title = "Formulaire Rôles";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

