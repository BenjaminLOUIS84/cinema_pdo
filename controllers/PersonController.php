<?php

require_once "bdd/DAO.php";

class PersonController {

    public function findAllActors(){

        $dao = new DAO();

        $sql = "SELECT p.id_personne, p.nom, p.prenom, p.sexe, p.date_naissance FROM personne p";

        $acteurs = $dao->executerRequete($sql);

        require "views/actor/listActors.php"; 
    }

    public function findAllDirectors(){

        $dao = new DAO();

        $sql = "SELECT p.id_personne, p.nom, p.prenom, p.sexe, p.date_naissance FROM personne p";

        $realisateurs = $dao->executerRequete($sql);

        require "views/director/listDirectors.php"; 
    }

}

?>