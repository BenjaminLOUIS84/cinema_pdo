<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Modifier le rôle</h1>

<h2>Remplir ce formulaire pour modifier un rôle de la base SQL</h2>

<div class="formulaire">

    <div class="formAdd">
            
            <h3>ROLES</h3>
    
            <form action = "index.php?action=modifRole" method = "post">                               <!-- Pour modifier un nouveau Rôle -->
    
                <?php
                    $role = $roles->fetch()                                                             // Utilisaion d'un fetch() pour que les inputs prennent la valeur du rôle à modifer
                ?>
    
                <p> 
                    <label>
                        Prénom <br>                                                                                 <!-- Champs de texte de saisie (value ou placeholder pour afficher le prénom à modifier) -->
                        <input class="nameGenre" type = "text" name = "firstname" value = "<?=$role["firstname"]?>"> 
                    </label>
                    <label>
                        Nom <br>
                        <input class="nameGenre" type = "text" name = "name" value = "<?=$role["name"]?>">          <!-- Champs de texte de saisie -->           
                    </label>
                </p> 
                
                <p>
                    <label>
                        Pseudo <br>
                        <input class="nameGenre" type = "text" name = "pseudo" value = "<?=$role["pseudo"]?>">      <!-- Champs de texte de saisie -->           
                    </label>
                </p> 
    
                <p>
                    <input class="add" type = "submit" name = "modifRole" value = "MODIFIER">          <!-- Bouton pour envoyer la demande -->
                </p>
    
            </form><br>
    </div>      

    <!-- <div class="formAdd"> -->
            
        <!-- <h3>ROLES</h3> -->

        <!-- <form action = "index.php?action=modifRole" method = "post">                               Pour modifier un nouveau Rôle -->

            <?php
               // $role = $roles->fetch()                                                  // Utilisaion d'un fetch() pour que les inputs prennent la valeur du rôle à modifer
            ?>

            <p> 
                <!-- <label> -->
                    <!-- Prénom <br>                                                                                 Champs de texte de saisie (value ou placeholder pour afficher le prénom à modifier) -->
                    <!-- <input class="nameGenre" type = "text" name = "firstname" value = "<?=$role["firstname"]?>">  -->
                <!-- </label> -->
                <!-- <label> -->
                    <!-- Nom <br> -->
                    <!-- <input class="nameGenre" type = "text" name = "name" value = "<?=$role["name"]?>">          Champs de texte de saisie            -->
                <!-- </label> -->
            </p> 
            <p>
                <!-- <label> -->
                    <!-- Pseudo <br> -->
                    <!-- <input class="nameGenre" type = "text" name = "pseudo" value = "<?=$role["pseudo"]?>">      Champs de texte de saisie            -->
                <!-- </label> -->
            </p> 

            <p>
                <!-- <input class="add" type = "submit" name = "modifRole" value = "MODIFIER">          Bouton pour envoyer la demande -->
            </p>

        <!-- </form><br> -->
    <!-- </div>       -->

</div>

<a class ="detail" href="index.php">Retour</a>                                                      <!-- Pour revenir à la page d'accueil -->

<?php

    $title = "Modifier Rôles";
    $content = ob_get_clean();                                                                      // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

