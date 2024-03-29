<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Rôles</h1>

<p>Remplir ce formulaire pour ajouter un nouveau rôle</p>

<div class="formulaire">

    <div class="formAdd">
            
        <h3>ROLES</h3>

        <form action="index.php?action=addRole" method="post">                          <!-- Pour ajouter un nouveau Rôle -->

            <div class="infos">
                <label for="firstname">Prénom</label>
                <input class="nameGenre" type="text" id="firstname" name="firstname">   <!-- Champs de texte de saisie -->           
            
                <label for="name">Nom</label>
                <input class="nameGenre" type="text" id="name" name="name">             <!-- Champs de texte de saisie -->           
            </div>
            <div class="infos">
                <label for="pseudo">Pseudo</label>
                <input class="nameGenre" type="text" id="pseudo" name="pseudo">         <!-- Champs de texte de saisie -->           
            
                <label for="perso">Ajouter votre image téléchargée</label>
                <input class="nameGenre" type="file" id="perso" name="perso">           <!-- Pour charger une image -->           
            </div>
            
            <input class="add" type="submit" name="addRole" value="AJOUTER">            <!-- Bouton pour envoyer la demande -->
    
        </form>

        <form action="index.php?action=delRole" method="post">                         

            <select class="nameGenre" name="role_acteur" required>                                               
                <option selected>Rôles</option> 
                    
                <?php                                                               // Utilisaion d'un fetch() pour que les Rôles soient dans la liste
                    while ($role = $roles->fetch()){                                // La value permet de récupérer l'id role_acteur

                        echo "<option value =".$role['role_acteur'].">".$role['firstname']." ".$role['name']." ".$role['pseudo']."</option>";   
                    }
                ?>
            </select>
             
            <input class="add" type="submit" name="delRole" value="SUPPRIMER">           
            
        </form>

    </div>

</div>

<a class ="detailR" href="index.php?action=listRoles">Retour</a>                                      <!-- Pour revenir à la page d'accueil -->

<?php

    $title = "Formulaire Rôles";
    $content = ob_get_clean();                                                      // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

