<?php

    require_once "bdd/DAO.php";

    class RoleController {

        public function findAllRoles(){

            $dao = new DAO();
            $sql = "SELECT r.role_acteur, r.name, r.firstname, r.pseudo FROM role_acteur r";
            $roles = $dao->executerRequete($sql);
            require "views/role/listRoles.php"; 
        }

        public function detailRole($idRole){

            $dao = new DAO();
            $sql = "SELECT r.firstname, r.name, r.pseudo, r.perso, p.prenom, p.nom, f.titre, f.id_film, a.id_acteur FROM role_acteur r, casting c, personne p, acteur a, film f
            WHERE a.id_personne = p.id_personne
            AND c.role_acteur = r.role_acteur
            AND c.id_acteur = a.id_acteur
            AND f.id_film = c.id_film
            AND r.role_acteur = :id";
            $roles = $dao->executerRequete($sql, [":id" => $idRole]);
            require "views/role/detailRole.php"; 
        }
    }

?>