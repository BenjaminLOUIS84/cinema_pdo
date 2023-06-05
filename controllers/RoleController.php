<?php

require_once "bdd/DAO.php";

class RoleController {

    public function findAllRoles(){

        $dao = new DAO();

        $sql = "SELECT r.role_acteur, r.nom, r.prenom, r.pseudo FROM role_acteur r";

        $roles = $dao->executerRequete($sql);

        require "views/role/listRoles.php"; 
    }
}

?>