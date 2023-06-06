<?php

require_once "bdd/DAO.php";

class MovieController {

    public function findAllMovies(){

        $dao = new DAO();

        $sql = "SELECT f.id_film, f.titre  FROM film f";

        $films = $dao->executerRequete($sql);

        require "views/movie/listMovies.php"; 
    }
}


?>