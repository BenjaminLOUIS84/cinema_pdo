<?php

require_once "bdd/DAO.php";

class PersonController {

    public function findAllActors(){

        $dao = new DAO();

        $sql = "SELECT a.id_acteur, p.nom, p.prenom, p.sexe, p.date_naissance FROM acteur a, personne p WHERE a.id_personne = p.id_personne";

        $acteurs = $dao->executerRequete($sql);

        require "views/actor/listActors.php"; 
    }

    public function findAllDirectors(){

        $dao = new DAO();

        $sql = "SELECT r.id_realisateur, p.nom, p.prenom, p.sexe, p.date_naissance FROM realisateur r, personne p WHERE r.id_personne = p.id_personne";

        $realisateurs = $dao->executerRequete($sql);

        require "views/director/listDirectors.php"; 
    }

}

?>