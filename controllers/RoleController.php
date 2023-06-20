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
            $sql = "SELECT r.firstname, r.name, r.pseudo, r.perso, p.prenom, p.nom, f.titre, f.id_film, r.role_acteur, a.id_acteur FROM role_acteur r, casting c, personne p, acteur a, film f
            WHERE a.id_personne = p.id_personne
            AND c.role_acteur = r.role_acteur
            AND c.id_acteur = a.id_acteur
            AND f.id_film = c.id_film
            AND r.role_acteur = :id";
           
           $roles = $dao->executerRequete($sql, [":id" => $idRole]);
            
           require "views/role/detailRole.php"; 
        }

         ///////////////////////////////////////////////////////////FORMULAIRE

         public function openFormulaireRole(){                                  //Fonction pour accéder au formulaire      
                                               
            $dao = new DAO();

            $sql2 = "SELECT ra.role_acteur, ra.firstname, ra.name, ra.pseudo                                      
            FROM role_acteur ra";
                        
            $roles = $dao->executerRequete($sql2);                               

            require "views/role/formulaireRole.php"; 
        }

        // public function openUpdateRole(){                                      //Fonction pour accéder au formulaire de modification      
                                               
        //     $dao = new DAO();

        //     $sql2 = "SELECT c.role_acteur, ra.role_acteur, ra.firstname, ra.name, ra.pseudo                                      
        //     FROM role_acteur ra
        //     INNER JOIN casting c
        //     ON ra.role_acteur = c.role_acteur";
                                        
        //     $roles = $dao->executerRequete($sql2);                            

        //     require "views/role/updateRole.php"; 
        // }

        public function openUpdateRole($idRole){                                      //Fonction pour accéder au formulaire de modification      
                                               
            $dao = new DAO();

            $sql2 = "SELECT ra.role_acteur, ra.firstname, ra.name, ra.pseudo                                      
            FROM role_acteur ra
            WHERE ra.role_acteur = :id";
                                                    
            $roles = $dao->executerRequete($sql2, [":id" => $idRole]);                            

            require "views/role/updateRole.php"; 
        }


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        public function addRole(){                                                 //Fonction pour ajouter un Rôle

            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role_acteur = filter_input(INPUT_POST, "role_acteur", FILTER_VALIDATE_INT);
            

            $dao = new DAO();                                                       //Requête SQL
            
            $sql1 ="INSERT INTO role_acteur(role_acteur, firstname, name, pseudo)                                         
            VALUES (:role_acteur, :firstname, :name, :pseudo)";                     //(:firsname, :name, ...) correspondent au prénom, nom ...du rôle inscrit par l'utilisateur

            $ajouterRole = $dao->executerRequete($sql1, ["role_acteur" => $role_acteur, "firstname" => $firstname, "name" => $name, "pseudo" => $pseudo ]);

            $_SESSION['flash_message'] = $firstname." ".$name." ".$pseudo." "."a été ajouté avec succès !";    
            $this->findAllRoles();                                                 //Etre redirigé sur la même page 
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        public function delRole(){                                                  //Fonction pour supprimer un Rôle

            $dao = new DAO();                                                       //Requête SQL pour supprimer un rôle
                                                                 
            $sql1 ="DELETE FROM role_acteur                                        
            WHERE role_acteur=(:role_acteur)";                                      //Condition pour éxecuter la suppression


            $role_acteur = filter_input(INPUT_POST, "role_acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $supprimerRole = $dao->executerRequete($sql1, ["role_acteur" => $role_acteur]);

            $_SESSION['flash_message'] = "Supprimé avec succès !";                  //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllRoles();                                                 //Etre redirigé sur la même page 
        }


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //-- UPDATE `role_acteur` SET `perso`='role25.jpg' WHERE  `role_acteur`=33; SQL pour intégrer la photo du rôle

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        public function modifRole(){                                               //Fonction pour modifier un Rôle

            
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // $firstnames = filter_var_array($array, ['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // $names = filter_var_array($array, ['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // $pseudos = filter_var_array($array, ['pseudo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role_acteur = filter_input(INPUT_POST, "role_acteur", FILTER_SANITIZE_NUMBER_INT);

            $dao = new DAO();                                                       //Requête SQL pour modifier le firstname, le name est le pseudo d'un rôle
                                                                 
            $sql1 = "UPDATE role_acteur
 
            SET firstname = :firstname, 
            name = :name,
            pseudo = :pseudo

            

            WHERE  role_acteur = :role_acteur";                                    //Condition pour éxecuter la modification

            $modifierRole = $dao->executerRequete($sql1, ["role_acteur" => $role_acteur, "firstname" => $firstname, "name" => $name, "pseudo" => $pseudo]);

            $_SESSION['flash_message'] = "Modifié avec succès !";                   //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllRoles();                                                  //Etre redirigé sur la même page 
        }


    }

?>