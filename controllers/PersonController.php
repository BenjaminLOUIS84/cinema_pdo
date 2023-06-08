<?php

    require_once "bdd/DAO.php";

    class PersonController {

        public function findAllActors(){

            $dao = new DAO();

            $sql = "SELECT a.id_acteur, p.nom, p.prenom FROM acteur a, personne p 
            WHERE a.id_personne = p.id_personne";

            $acteurs = $dao->executerRequete($sql);

            require "views/actor/listActors.php"; 
        }

        public function detailActor($idActor){

            $dao = new DAO();

            $sql = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance,'%d-%m-%Y') AS date_nais, p.portrait FROM acteur a, personne p
            WHERE a.id_personne = p.id_personne 
            AND a.id_acteur = $idActor" ;

            $acteurs = $dao->executerRequete($sql);

            require "views/actor/detailActor.php"; 
        }

        public function findAllDirectors(){

            $dao = new DAO();

            $sql = "SELECT r.id_realisateur, p.nom, p.prenom, p.sexe FROM realisateur r, personne p
            WHERE r.id_personne = p.id_personne";

            $realisateurs = $dao->executerRequete($sql);

            require "views/director/listDirectors.php"; 
        }

        public function detailDirector($idDirector){

            $dao = new DAO();

            $sql = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance,'%d-%m-%Y') AS date_nais, p.portrait FROM realisateur r, personne p
            WHERE r.id_personne = p.id_personne 
            AND r.id_realisateur = $idDirector";

            $realisateurs = $dao->executerRequete($sql);

            require "views/director/detailDirector.php"; 
        }

        public function filmographyDirector(){

            $dao = new DAO();   

            $sql = "SELECT f.titre, p.nom, p.prenom, r.id_realisateur, f.id_film FROM film f
            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p
            ON p.id_personne = r.id_personne
            
            AND r.id_realisateur = 1";

            $realisateurs = $dao->executerRequete($sql);

            require "views/director/filmographyDirector.php";
        }

    }

?>