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

        $sql ="SELECT g.type, f.titre FROM film f, classer c, genre_film g
        WHERE c.genre_film = g.genre_film
        AND f.id_film = c.id_film
        AND g.genre_film = $idGenre";

        $genres = $dao->executerRequete($sql);

        require "views/genre/detailGenre.php"; 

    }
}

?>