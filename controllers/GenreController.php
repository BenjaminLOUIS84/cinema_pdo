<?php

    require_once "bdd/DAO.php";

    class GenreController {

        public function findAllGenres(){                                            //Fonction pour afficher la liste des genres

            $dao = new DAO();
            $sql = "SELECT g.id_genre, g.type FROM genre g";
            $genres = $dao->executerRequete($sql);
            require "views/genre/listGenres.php"; 
        }

        public function detailGenre($idGenre){

            $dao = new DAO();
            $sql ="SELECT g.type, f.titre, f.id_film FROM film f, classer c, genre g
            WHERE c.id_genre = g.id_genre
            AND f.id_film = c.id_film
            AND g.id_genre = :id";
            $genres = $dao->executerRequete($sql, [":id" => $idGenre]);
            require "views/genre/detailGenre.php"; 
        }

        ///////////////////////////////////////////////////////////FORMULAIRE

        public function openFormulaireGenre(){                                      //Fonction pour accéder au formulaire                                      
            $dao = new DAO();

            $sql2 = "SELECT g.type, g.id_genre                                      
            FROM genre g";            
            $genres = $dao->executerRequete($sql2);                                 //Requête SQL SELECT pour Sélectionner les Genres à supprimer

            require "views/genre/formulaireGenre.php"; 
        }

        public function addGenre(){                                                 //Fonction pour ajouter un Genre

            $dao = new DAO();                                                       //Requête SQL
            $sql1 ="INSERT INTO genre(type)                                         
            VALUES (:type)";                                                        //(:type) correspond au nom du genre inscrit par l'utilisateur

            $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ajout = $dao->executerRequete($sql1, ["type" => $type]);

            $_SESSION['flash_message'] = $type." "."a été ajouté avec succès !";    //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllGenres();                                                 //Etre redirigé sur la même page 
        }

        public function delGenre(){

            $dao = new DAO();                                                       //Requête SQL pour supprimer un genre de film
            $sql1 ="DELETE FROM cinema.genre                                        
            WHERE type=(:type)";

            $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $supprimer = $dao->executerRequete($sql1, ["type" => $type]);

            $_SESSION['flash_message'] = $type." "."a été supprimé avec succès !";  //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllGenres();                                                 //Etre redirigé sur la même page 
        }
    }
                              
?>