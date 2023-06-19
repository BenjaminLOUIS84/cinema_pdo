<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Mettre à jour le rôle</h1>

<h2>Remplir ce formulaire pour modifier un rôle de la base SQL</h2>

<div class="formulaire">

    <div class="formAdd">
            
        <h3>ROLES</h3>

        <form action = "index.php?action=updateRole" method = "post">                         <!-- Pour ajouter un nouveau Rôle -->

            <p>
                <label>
                    Prénom <br>
                    <input class="nameGenre" type = "text" name = "firstname">          <!-- Champs de texte de saisie -->           
                </label>
                <label>
                    Nom <br>
                    <input class="nameGenre" type = "text" name = "name">          <!-- Champs de texte de saisie -->           
                </label>
            </p> 
            <p>
                <label>
                    Pseudo <br>
                    <input class="nameGenre" type = "text" name = "pseudo">          <!-- Champs de texte de saisie -->           
                </label>
            </p> 

            <p>
                <input class="add" type = "submit" name = "updateRole" value = "MODIFIER">     <!-- Bouton pour envoyer la demande -->
            </p>

        </form><br>
    </div>      

</div>

<a class ="detail" href="index.php">Retour</a>                                          <!-- Pour revenir à la page d'accueil -->

<?php

    $title = "Modifier Rôles";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

