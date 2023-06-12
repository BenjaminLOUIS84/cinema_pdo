<?php

    require_once "bdd/DAO.php";

    class GenreController {

        public function findAllGenres(){

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

        // public function openFormulaire(){

        //     $dao = new DAO();

        //     require "views/genre/formulaireGenre.php"; 
        // }
        
        //public function addGenre(){

            // $dao = new DAO();

            // $sql ="INSERT INTO genre_film ('genre_film', 'type') VALUES
            // ('genre_film', 'type');"


            // require "views/genre/formulaireGenre.php";
           
        //}



    }

?>