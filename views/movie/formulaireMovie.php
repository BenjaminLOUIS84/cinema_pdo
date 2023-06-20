<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<h1>Formulaire Films</h1>

<h2>Remplir ce formulaire pour ajouter un nouveau film dans la base SQL</h2>

<div class="formulaire">

    <form action = "index.php?action=addMovie" method = "post">                                 <!-- Le formulaire doit déclencher l'action de la fonction addMovie() -->
            
        <div class="formAdd">

            <h3>FILMS</h3>
            
            <label for="titre">Titre</label>                                                   <!-- input (champs de saisi de texte) -->
            <input class="name" type="text" id="titre" name="titre" required>                  <!-- Le name de cet input doit correspondre à la variable $titre -->
            
            <label for="annee_sortie">Année</label>                                            <!-- input (champs de saisi de numérique ) -->
            <input class="name" type="int" id="annee_sortie" name="annee_sortie" required>     <!-- Le name de l'input doit correspondre à la variable $annee_sortie -->
            
            <label for="duree">Durée</label> 
            <input class="name" type="int" id="duree" name="duree" required>          
            
            <label for="note">Note</label>
            <input class="name" type="int" id="note" name="note" required>          
            
            <label for="synopsis">Synopsis</label>                                                    
            <input class="nameSynopsis" type="text" id="synospsis" name="synopsis" required>          
            
        </div>

        <div class="formAdd">

            <h3>GENRES</h3>

            <!-- Lier les genres aux Films en créant une liste déroulante --> 

            <select class="nameGenre" name="id_genre[]" required> 
                <option selected>Genres</option> 
                
                <?php

                    while ($genre = $genres->fetch()){                                             // Utilisaion d'un fetch() pour que les Genres soient dans la liste

                        echo "<option value=".$genre['id_genre'].">".$genre['type']."</option>";   // La value permet de récupérer l'id_genre
                    }
                ?>

            </select>

        </div>

        <div class="formAdd">

            <h3>REALISATEURS</h3>

            <!-- Lier les réalisateurs aux films en créant aussi une liste déroulante-->

            <select class="nameRealisateur" type="text" name="id_realisateur" required>          
                <option selected>Realisateurs</option>
            
                <?php

                    while ($realisateur = $realisateurs->fetch()){

                        echo "<option value=".$realisateur['id_realisateur'].">".$realisateur['prenom']." ".$realisateur['nom']."</option>";
                    }
                ?>

            </select>

        </div>

        <div class="formAdd">

            <h3>CASTING</h3>

            <!-- Lier les castings aux films en créant aussi une liste déroulante des acteurs et une liste déroulante des rôles-->

            <select class="nameCasting" type="text" name="id_acteur" required>          
                <option selected>Acteurs</option>

                <?php
                    while ($acteur=$acteurs->fetch()){
                        echo "<option value=".$acteur['id_acteur'].">".$acteur['prenom']." ".$acteur['nom']."</option>";
                    }
                ?>

            </select>
            
            <select class="nameCasting" type="text" name="role_acteur" required>          
                <option selected>Rôles</option>

                <?php
                    while ($role = $roles->fetch()){
                        echo "<option value = ".$role['role_acteur'].">".$role['firstname']." ".$role['name']." ".$role['pseudo']."</option>";
                    }
                ?>

            </select>

        </div>                                                                      <!-- Bouton pour envoyer la demande au MovieController -->
                                          
        <input class="add" type="submit" name="addMovie" value="AJOUTER">           <!-- Le name de l'input doit correspondre à la fonction  addMovie() -->

    </form>

    <div class="formAdd">

        <form action="index.php?action=delMovie" method="post">                         

            <select class="nameGenre" name="id_film" required>                                               
                <option selected>Films</option> 
            
            <?php
                while ($movie = $movies->fetch()){                                             // Utilisaion d'un fetch() pour que les Genres soient dans la liste

                    echo "<option value=".$movie['id_film'].">".$movie['titre']."</option>";   // La value permet de récupérer l'id_genre et d'afficher le nom du genre (type)
                }
            ?>
            </select>
            
            <input class="add" type="submit" name="delMovie" value="SUPPRIMER">           

        </form>
        
    </div>

</div>

<a class ="detail" href="index.php">Retour</a>

<?php
    $title = "Formulaire Movie";
    $content = ob_get_clean();                                                                  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>