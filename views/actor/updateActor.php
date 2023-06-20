<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Modifier l'acteur</h1>

<h2>Remplir ce formulaire pour modifier un acteur de la base SQL</h2>

<div class="formulaire">

    <div class="formAdd">
            
        <h3>ACTEURS</h3>

        <form action="index.php?action=modifActor" method="post">                                              <!-- Pour modifier un Rôle -->

            <?php
                $acteur = $acteurs->fetch()                                                                   // Utilisaion d'un fetch() pour que les inputs prennent la valeur du rôle à modifer      
            ?>

            <label for="prenom">Prénom</label>                                                                 <!-- Champs de texte de saisie (value ou placeholder pour afficher le prénom à modifier) -->
            <input class="nameGenre" type="text" id="prenom" name="prenom" value="<?=$acteur["prenom"]?>" />
            
            <label for="nom">Nom</label>
            <input class="nameGenre" type="text" id="nom" name="nom" value="<?=$acteur["nom"]?>">              <!-- Champs de texte de saisie -->           
            
            <label for="sexe">Sexe</label>
            <input class="nameGenre" type="text" id="sexe" name="sexe" value="<?=$acteur["sexe"]?>">           <!-- Champs de texte de saisie -->           
            
            <label for="date_naissance">Date de naissance</label>
            <input class="nameGenre" type="date" id="date_naissance" name="date_naissance">                    <!-- Champs de texte de saisie -->           
        
            <input class="add" type="submit" name="modifActor" value="MODIFIER">                               <!-- Bouton pour envoyer la demande -->
        
            <input class="add" type="hidden" name="id_personne" value="<?=$acteur["id_personne"]?>">         

        </form>

    </div>      

</div>

<a class="detailR" href="index.php?action=listActors">Retour</a>                                                  <!-- Pour revenir à la page d'accueil -->

<?php
    $title = "Modifier Acteurs";
    $content = ob_get_clean();                                                                                      // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>

