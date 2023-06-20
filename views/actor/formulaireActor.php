<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Acteurs</h1>

<h2>Remplir ce formulaire pour supprimer ou ajouter un nouvel acteur à la base SQL</h2>

<div class="formulaire">

    <div class="formAddActeur">

        <h3>ACTEURS</h3>

        <form action="index.php?action=addActor" method="post">

            <div class=infos">
                <label for="nom">Nom</label>
                <input id="nom" class="nameR" type="text" name="nom" required>
                
                <label for="prenom">Prénom</label>
                <input id=prenom" class="nameR" type="text" name="prenom" required>
            </div>
            <div class="infos">
                <label for="sexe">Sexe</label>
                <input id="sexe" class="nameR" type="text" name="sexe" required>
                
                <label for="date_naissance">Date de naissance</label>
                <input id="date_naissance" class="nameR" type="date" name="date_naissance" required>
            </div>
            <div class="infos">
                <label for="portrait">Ajouter une image</label>
                <input class="nameGenre" type="file" id="portrait" name="portrait">           <!-- Pour charger une image -->           
            </div>
            <input class="add" type="submit" name="addActor" value="AJOUTER">  
            
            <!-- Le bouton AJOUTER va envoyer la demande POST pour exécuter le cas (case) "addActor" à l'index.php
            l'index.php obtient la demande GET et va a ensuite exécuter le cas pour envoyer POST à PersonController,
            PersonneController va exécuter la fonction addActor() qui contient les requêtes SQL pour ajouter une nouvelle personne avec le statut d'acteur -->

        </form>

        <form action="index.php?action=delActor" method="post">                         

            
            <select class="nameR" type="text" name="id_acteur" required>                                               
                <option selected>Acteurs</option> 
    
                <?php                                                                       // Avec le type <select><option> les acteurs sont dans une liste déroulante
                    while ($acteur = $acteurs->fetch()){                                    // Utilisaion d'un fetch() pour que les acteurs soient dans la liste

                        echo "<option value=".$acteur['id_acteur'].">
                        ".$acteur['prenom']." ".$acteur['nom']."</option>";                 // La value permet de récupérer l'id_acteur et d'afficher le nom et le prénom d'un acteur
                    }           
                ?>
            </select>
             
            <input class="add" type="submit" name="delActor" value="SUPPRIMER">           
        
        </form>

    </div>

</div>

<a class="detailR" href="index.php?action=listActors">Retour</a>

<?php

    $title = "Formulaire Acteur";
    $content = ob_get_clean();                                                                  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";

?>

