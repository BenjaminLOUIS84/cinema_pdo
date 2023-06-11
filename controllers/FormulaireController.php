<?php

    require_once "bdd/DAO.php";

    class FormulaireController {

        public function openFormulaire(){

            $dao = new DAO();

            //$sql = "SELECT g.genre_film, g.type FROM genre_film g";
            
            //$genres = $dao->executerRequete($sql);

            require "views/home/formulaire.php"; 
        }

    }

?>