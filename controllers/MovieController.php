<?php

require_once "bdd/DAO.php";

class MovieController {

    public function findAllMovies(){

        $dao = new DAO();

        $sql = "SELECT f.id_film, f.titre  FROM film f";

        $films = $dao->executerRequete($sql);

        require "views/movie/listMovies.php"; 
    }

    public function detailMovie($idFilm){

        $dao = new DAO();

        $sql = "SELECT f.titre, f.annee_sortie, f.duree, f.affiche, f.note, f.synopsis  FROM film f 
        WHERE f.id_film = $idFilm" ;

        $films = $dao->executerRequete($sql);

        require "views/movie/detailMovie.php"; 

    }

}


?>