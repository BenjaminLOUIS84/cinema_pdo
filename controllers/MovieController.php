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

            ////////////////////////////////////////////////////////////Requête SQL1

            $sql = "SELECT f.titre, f.annee_sortie, f.duree, p.prenom, p.nom, f.affiche, f.note, f.synopsis, f.id_realisateur, f.id_film FROM film f, personne p, realisateur r
            WHERE f.id_realisateur = r.id_realisateur
            AND p.id_personne = r.id_personne
            
            AND f.id_film = :id" ;                //Pour empécher le piratage on met la clé dans un opérateur de solution de portée

            $films = $dao->executerRequete($sql, [":id" => $idFilm]);
            
            ////////////////////////////////////////////////////////////Requête SQL2
        
            $sql2 = "SELECT c.id_film, p.nom, p.prenom, c.id_acteur, ra.name, ra.firstname, ra.pseudo, ra.role_acteur FROM casting c
            INNER JOIN acteur a
            ON a.id_acteur = c.id_acteur
            INNER JOIN personne p
            ON p.id_personne = a.id_personne
            INNER JOIN role_acteur ra
            ON ra.role_acteur = c.role_acteur
    
            AND c.id_film = :id" ;
    
            $acteurs = $dao->executerRequete($sql2, [":id" => $idFilm]);

            ////////////////////////////////////////////////////////////Requête SQL3

            $sql3 ="SELECT g.type, g.genre_film FROM film f, classer c, genre_film g
            WHERE c.genre_film = g.genre_film
            AND f.id_film = c.id_film
            AND f.id_film = :id" ;

            $genres = $dao->executerRequete($sql3, [":id" => $idFilm]);

            require "views/movie/detailMovie.php"; 

        }

        public function openFormulaire(){

            $dao = new DAO();

            require "views/movie/formulaireMovie.php"; 
        }
        
        public function addMovie($array){

            $titre = filter_input(INPUT_POST , "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //Mettre ce filtre l'input pour éviter les injections SQL ou XSS
            
            $dao = new DAO();

            $sql1 ="INSERT INTO film(titre)                                 
            VALUES (:titre);";
  
            $addMovie = $dao->executerRequete($sql1, [":titre" =>$titre]);
            
            require "views/movie/formulaireMovie.php";
           
        }

    }

?>