<?php

    require_once "bdd/DAO.php";

    class GenreController {

        public function findAllGenres(){                                            //Fonction pour afficher la liste des genres

            $dao = new DAO();
            $sql = "SELECT g.genre_film, g.type FROM genre_film g";
            $genres = $dao->executerRequete($sql);
            require "views/genre/listGenres.php"; 
        }

        public function detailGenre($idGenre){

            $dao = new DAO();
            $sql ="SELECT g.type, f.titre, f.id_film FROM film f, classer c, genre_film g
            WHERE c.genre_film = g.genre_film
            AND f.id_film = c.id_film
            AND g.genre_film = :id";
            $genres = $dao->executerRequete($sql, [":id" => $idGenre]);
            require "views/genre/detailGenre.php"; 
        }

        ///////////////////////////////////////////////////////////FORMULAIRE

        public function openFormulaireGenre(){                                      //Fonction pour accéder au formulaire                                      
            $dao = new DAO();
            require "views/genre/formulaireGenre.php"; 
        }

        public function addGenre(){

            $dao = new DAO();
            $sql1 ="INSERT INTO genre_film(type)
            VALUES (:type)";

            $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ajout = $dao->executerRequete($sql1, ["type" => $type]);

            $_SESSION['flash_message'] = $type." "."a été ajouté avec succès !";    //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllGenres();                                                 //Etre redirigé sur la même page 
        }
    }

                                                                                    // INFOS    DELETE FROM cinema.genre_film WHERE  genre_film=19;  Requête SQL pour supprimer un genre de film
?>