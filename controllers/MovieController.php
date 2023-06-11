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

        public function distribution($idFilm){

            $dao = new DAO();

            $sql = "SELECT c.id_film, a.id_acteur, c.id_acteur, p.nom, p.prenom, p.sexe
            FROM casting c
            INNER JOIN acteur a
            ON a.id_acteur = c.id_acteur
            INNER JOIN personne p
            ON p.id_personne = a.id_personne
            AND c.id_film = $idFilm" ;

            $films = $dao->executerRequete($sql);

            require "views/movie/distribution.php"; 

        }
    }


?>