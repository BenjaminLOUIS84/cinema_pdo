<?php

require_once "bdd/DAO.php";

class GenreController {

    public function findAllGenres(){

        $dao = new DAO();

        $sql = "SELECT g.genre_film, g.type FROM genre_film g";

        $genres = $dao->executerRequete($sql);

        require "views/genre/listGenres.php"; 
    }
}

?>