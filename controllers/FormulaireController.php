<?php

    // Ouvrir une session sur le serveur avec la fonction session_start()
    //session_start();

    require_once "bdd/DAO.php";

    class FormulaireController {

        public function openFormulaire(){

            $dao = new DAO();

            require "views/home/formulaire.php"; 
        }

        public function addGenre(){

            // Vérifier l'éxistence d'une requête POST (vérifier l'existence de la clé "submit dans le tableau POST)
            // Créer une condition pour limiter l'accès à cette page par les seules requêtes HTTP provenant de la soumission de notre formulaire.

            if(isset($_POST['addGenre'])){

                //Supprime toute présence de caractères spéciaux et de toute balise HTML (Pas d'injection de code HTML possible)

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            
                // Vérifier si les filtres ont tous fonctionnés grâce à la condition ci dessous

                if($name){

                    // Organiser les données pour conserver chaque produit renseigné
                    // Stcoker nos données en session en ajoutant celles-ci au tableau $_SESSION fournis par PHP
                    // Construire un tableau associatif $newGenre pour conserver chaque genres renseignés
            
                    $newGenre = [
                        "name" => $name
                    ];

                    // Enregistrer le tableau de genre créer en session (tableau contenant des références enregistrer dans le stock)
            
                    $_SESSION['genre'][] = $newGenre;

                    // Afficher une message à chaque ajout de genre
            
                    $_SESSION['checkSuccess'] = "<div id = messAdd><p>Genre ajouté avec succès !</p></div>";
                }

                header("Location:formulaire.php");
                exit;  
            }

            $dao = new DAO();

            //$sql = "INSERT INTO genre_film (genre_film, type) VALUES (5, 'Horreur');";
            
            //$genres = $dao->executerRequete($sql);

           require "views/home/formulaire.php";

        }

    }

?>