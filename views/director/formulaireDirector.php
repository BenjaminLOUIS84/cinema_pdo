<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Réalisateurs</h1>

<p>Remplir ce formulaire pour ajouter un nouveau réalisateur</p>

<div class="formulaire">

    <div class="formAddRealisateur">

        <h3>REALISATEURS</h3>

        <form action="index.php?action=addDirector" method="post">

            <div class="infos">
                <label for="nom">Nom</label>
                <input id="nom" class="nameR" type="text" name="nom" required>
                
                <label for="prenom">Prénom</label>
                <input id="prenom" class="nameR" type="text" name="prenom" required>
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
            
            <input class="add" type="submit" name="addDirector" value="AJOUTER">
        
        </form>
    
        <form action="index.php?action=delDirector" method="post">                         

            <select class="nameR" type="text" name="id_realisateur" required>                                               
                <option selected>Réalisateurs</option> 
    
                <?php                                                                       // Avec le type <select><option> les réalisateurs sont dans une liste déroulante
                    while ($realisateur = $realisateurs->fetch()){                          // Utilisaion d'un fetch() pour que les réalisateurs soient dans la liste

                        echo "<option value=".$realisateur['id_realisateur'].">
                        ".$realisateur['prenom']." ".$realisateur['nom']."</option>";       // La value permet de récupérer l'id_realisateur et d'afficher le nom et le prénom d'un réalisateur
                    }           
                ?>

            </select>
             
            <input class="add" type="submit" name="delDirector" value="SUPPRIMER">           
            
        </form>

    </div>

</div>

<a class="detailR" href="index.php?action=listDirectors">Retour</a>

<?php
    $title = "Formulaire Réalisateur";
    $content = ob_get_clean();                                                                  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>

