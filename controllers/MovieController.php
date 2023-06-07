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

            $sql = "SELECT f.titre, f.annee_sortie, f.duree, p.prenom, p.nom, f.affiche, f.note, f.synopsis, f.id_realisateur  FROM film f, personne p, realisateur r
            WHERE f.id_realisateur = r.id_realisateur
            AND p.id_personne = r.id_personne
            AND f.id_film = $idFilm" ;

            $films = $dao->executerRequete($sql);

            require "views/movie/detailMovie.php"; 

        }

    }


?>