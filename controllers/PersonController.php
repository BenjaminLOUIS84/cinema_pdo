<?php

    require_once "bdd/DAO.php";

    class PersonController {
        //////////////////////////////////////////////////////FONCTIONS POUR LES ACTEURS
        public function findAllActors(){

            $dao = new DAO();

            $sql = "SELECT a.id_acteur, p.nom, p.prenom FROM acteur a, personne p 
            WHERE a.id_personne = p.id_personne";

            $acteurs = $dao->executerRequete($sql);

            require "views/actor/listActors.php"; 
        }

        public function detailActor($idActor){

            $dao = new DAO();

            $sql = "SELECT p.id_personne, a.id_acteur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance,'%d-%m-%Y') AS date_nais, p.portrait FROM acteur a, personne p
            WHERE a.id_personne = p.id_personne 
            AND a.id_acteur = :id";

            $acteurs = $dao->executerRequete($sql, [":id" => $idActor]);

            require "views/actor/detailActor.php"; 
        }

        public function filmographyActor($idActor){

            $dao = new DAO();   

            $sql = "SELECT f.titre, p.nom, p.prenom, c.id_acteur, a.id_acteur, f.id_film
            FROM personne p, acteur a, casting c, film f
            WHERE a.id_acteur = c.id_acteur
            AND f.id_film = c.id_film
            AND p.id_personne = a.id_personne
            
            AND a.id_acteur = :id"; 

            $acteurs = $dao->executerRequete($sql, [":id" => $idActor]);

            require "views/actor/filmographyActor.php";
        }

        ///////////////////////////////////////////////////////////FORMULAIRE

        public function openFormulaireActor(){                                                               // Fonction pour accéder au formulaire 
                                                                                       
            $dao = new DAO();

            $sql1 = "SELECT p.prenom, p.nom, p.id_personne, p.portrait
            FROM personne p"; 
            $personnes = $dao->executerRequete($sql1);                                                           // Pour sélectionner la personne et le réalisateur 

            $sql2 = "SELECT p.prenom, p.nom, a.id_acteur
            FROM personne p
            INNER JOIN acteur a
            ON a.id_personne = p.id_personne
            ORDER BY nom ASC"; 
            $acteurs = $dao->executerRequete($sql2);

            require "views/actor/formulaireActor.php"; 
        }

        public function openUpdateActor($idActor){                                                        //Fonction pour accéder au formulaire de modification      
                                               
            $dao = new DAO();

            $sql2 = "SELECT p.id_personne, a.id_acteur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance,'%d-%m-%Y') AS date_nais, p.portrait FROM acteur a, personne p
            WHERE a.id_personne = p.id_personne 
            AND a.id_acteur = :id";
                                                    
            $acteurs = $dao->executerRequete($sql2, [":id" => $idActor]);                            

            require "views/actor/updateActor.php"; 
        }

        public function addActor($array){

            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);                         // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            
            $portrait = filter_input(INPUT_POST, "portrait", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $id_personne = filter_input(INPUT_POST, "id_personne", FILTER_SANITIZE_NUMBER_INT);         
            $id_acteur = filter_input(INPUT_POST, "id_acteur", FILTER_SANITIZE_NUMBER_INT);                            // Récupération de l'id_acteur pour la jonction

            $dao = new DAO();

            $sql1 = "INSERT INTO personne(nom, prenom, sexe, date_naissance, id_personne, portrait)                        
            VALUES (:nom, :prenom, :sexe, :date_naissance, :id_personne, :portrait)";                                      // Pour ajouter des nouvelles personnes

            $sql2 = "INSERT INTO acteur(id_personne, id_acteur)                                                                              
            VALUES (:id_personne, :id_acteur)";                                                                 // Pour attribuer le statut d'acteur aux nouvelles personnes

            $ajouterPersonne = $dao->executerRequete($sql1, ["nom" => $nom, "prenom" => $prenom,
            "sexe" =>$sexe, "date_naissance" => $date_naissance, "id_personne" => $id_personne, "portrait" => $portrait]);

            $id_new_personne = $dao->getBDD()->lastInsertId();

            $ajouterActeur = $dao->executerRequete($sql2, ["id_personne" => $id_new_personne, "id_acteur" => $id_acteur]);

            $_SESSION['flash_message'] = $prenom." ".$nom." "."a été ajouté avec succès !";                     //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllActors();                     
        }
        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        public function delActor(){                                                                 //Fonction pour supprimer un Acteur

            // var_dump($_POST);

            // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            
            $id_acteur = filter_input(INPUT_POST, "id_acteur", FILTER_SANITIZE_NUMBER_INT);
            
            $dao = new DAO();                                                                       //Requête SQL pour supprimer un acteur des Tables Réalisateur et Personne
            
            $sql1 ="DELETE FROM personne p                                     
            WHERE p.id_personne = (
            SELECT a.id_personne
            FROM acteur a
            WHERE a.id_personne = p.id_personne
            AND id_acteur =(:id_acteur)
            )";                                                                                                 
	    
            $supprimerActeur = $dao->executerRequete($sql1, ["id_acteur" => $id_acteur]);

            $_SESSION['flash_message'] = "Supprimé avec succès !";                                      //Pour afficher un message Flash à chaque suppression inscrire cette variable dans chaque partie
            $this->findAllActors();                                                                     //Etre redirigé sur la même page 
        }

        public function modifActor(){                                                                   //Fonction pour modifier un Rôle

            
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);                 // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $id_personne = filter_input(INPUT_POST, "id_personne", FILTER_SANITIZE_NUMBER_INT);         
            $id_acteur = filter_input(INPUT_POST, "id_acteur",FILTER_SANITIZE_NUMBER_INT);              // Récupération de l'id_realisateur pour la jonction

            $dao = new DAO();                                                                           //Requête SQL pour modifier le firstname, le name est le pseudo d'un rôle
                                                                 
            $sql1 ="UPDATE personne
 
            SET prenom = :prenom, 
            nom = :nom,
            sexe = :sexe,
            date_naissance = :date_naissance
            WHERE  id_personne = :id_personne";                                                         //Condition pour éxecuter la modification

            $modifierActeur = $dao->executerRequete($sql1, ["id_personne" => $id_personne, "prenom" => $prenom, "nom" => $nom, "sexe" => $sexe, "date_naissance" => $date_naissance]);

            $_SESSION['flash_message'] = "Modifié avec succès !";                                       //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllActors();                                                                     //Etre redirigé sur la même page 
        }

        //////////////////////////////////////////////////////FONCTIONS POUR LES REALISATEURS

        public function findAllDirectors(){

            $dao = new DAO();

            $sql = "SELECT r.id_realisateur, p.nom, p.prenom, p.sexe FROM realisateur r, personne p
            WHERE r.id_personne = p.id_personne";

            $realisateurs = $dao->executerRequete($sql);

            require "views/director/listDirectors.php"; 
        }

        public function detailDirector($idDirector){

            $dao = new DAO();

            $sql = "SELECT p.id_personne, r.id_realisateur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance,'%d-%m-%Y') AS date_nais, p.portrait FROM realisateur r, personne p
            WHERE r.id_personne = p.id_personne 
            AND r.id_realisateur = :id";

            $realisateurs = $dao->executerRequete($sql, [":id" => $idDirector]);

            require "views/director/detailDirector.php"; 
        }

        public function filmographyDirector($idDirector){

            $dao = new DAO();   

            $sql = "SELECT f.titre, p.nom, p.prenom, r.id_realisateur, f.id_film
            FROM film f
            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p
            ON p.id_personne = r.id_personne

            AND r.id_realisateur = :id"; 

            $realisateurs = $dao->executerRequete($sql, [":id" => $idDirector]);

            require "views/director/filmographyDirector.php";
        }

        ///////////////////////////////////////////////////////////FORMULAIRE

        public function openFormulaireDirector(){                                                               // Fonction pour accéder au formulaire 
                                                                                       
            $dao = new DAO();

            $sql1 = "SELECT p.prenom, p.nom, p.id_personne
            FROM personne p"; 
            $personnes = $dao->executerRequete($sql1);                                                           // Pour sélectionner la personne et le réalisateur 

            $sql2 = "SELECT p.prenom, p.nom, r.id_realisateur
            FROM personne p
            INNER JOIN realisateur r
            ON r.id_personne = p.id_personne
            ORDER BY nom ASC"; 
            $realisateurs = $dao->executerRequete($sql2);

            require "views/director/formulaireDirector.php"; 
        }

        public function openUpdateDirector($idDirector){                                                        //Fonction pour accéder au formulaire de modification      
                                               
            $dao = new DAO();

            $sql2 = "SELECT p.id_personne, r.id_realisateur, p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance,'%d-%m-%Y') AS date_nais, p.portrait FROM realisateur r, personne p
            WHERE r.id_personne = p.id_personne 
            AND r.id_realisateur = :id";
                                                    
            $realisateurs = $dao->executerRequete($sql2, [":id" => $idDirector]);                            

            require "views/director/updateDirector.php"; 
        }

        public function addDirector($array){

            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);                         // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            
            $id_personne = filter_input(INPUT_POST, "id_personne", FILTER_SANITIZE_NUMBER_INT);         
            $id_realisateur = filter_input(INPUT_POST, "id_realisateur",FILTER_SANITIZE_NUMBER_INT);                  // Récupération de l'id_realisateur pour la jonction

            $dao = new DAO();

            $sql1 = "INSERT INTO personne(nom, prenom, sexe, date_naissance, id_personne)                        
            VALUES (:nom, :prenom, :sexe, :date_naissance, :id_personne)";                                      // Pour ajouter des nouvelles personnes

            $sql2 = "INSERT INTO realisateur(id_personne, id_realisateur)                                                                              
            VALUES (:id_personne, :id_realisateur)";                                                            // Pour attribuer le statut de réalisateur aux nouvelles personnes

            $ajouterPersonne = $dao->executerRequete($sql1, ["nom" => $nom, "prenom" => $prenom,
            "sexe" =>$sexe, "date_naissance" => $date_naissance, "id_personne" => $id_personne]);

            $id_new_personne = $dao->getBDD()->lastInsertId();

            $ajouterRealisateur = $dao->executerRequete($sql2, ["id_personne" => $id_new_personne,"id_realisateur" => $id_realisateur]);

            $_SESSION['flash_message'] = $prenom." ".$nom." "."a été ajouté avec succès !";                     //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllDirectors();                     
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        //-- UPDATE personne SET portrait = realisateur12.jpg WHERE  id_personne = (:id_personne); SQL pour intégrer la photo d'une personne
            
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        public function delDirector(){                                                              //Fonction pour supprimer un Réalisateur

            // var_dump($_POST);

            // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $id_realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_SANITIZE_NUMBER_INT);
            
            $dao = new DAO();                                                                       //Requête SQL pour supprimer un réalisateur des Tables Réalisateur et Personne
            
            $sql1 ="DELETE FROM personne p                                     
            WHERE p.id_personne = (
            SELECT r.id_personne
            FROM realisateur r
            WHERE r.id_personne = p.id_personne
            AND id_realisateur =(:id_realisateur)
            )";                                                                                                 
	    
            $supprimerRealisateur = $dao->executerRequete($sql1, ["id_realisateur" => $id_realisateur]);

            $_SESSION['flash_message'] = "Supprimé avec succès !";                                  //Pour afficher un message Flash à chaque suppression inscrire cette variable dans chaque partie
            $this->findAllDirectors();                                                              //Etre redirigé sur la même page 
        }

        public function modifDirector(){                                                            //Fonction pour modifier un Rôle

            
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);             // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $id_personne = filter_input(INPUT_POST, "id_personne", FILTER_SANITIZE_NUMBER_INT);         
            $id_realisateur = filter_input(INPUT_POST, "id_realisateur",FILTER_SANITIZE_NUMBER_INT); // Récupération de l'id_realisateur pour la jonction

            $dao = new DAO();                                                                        //Requête SQL pour modifier le firstname, le name est le pseudo d'un rôle
                                                                 
            $sql1 ="UPDATE personne
 
            SET prenom = :prenom, 
            nom = :nom,
            sexe = :sexe,
            date_naissance = :date_naissance
            WHERE  id_personne = :id_personne";                                                     //Condition pour éxecuter la modification

            $modifierRealisateur = $dao->executerRequete($sql1, ["id_personne" => $id_personne, "prenom" => $prenom, "nom" => $nom, "sexe" => $sexe, "date_naissance" => $date_naissance]);

            $_SESSION['flash_message'] = "Modifié avec succès !";                               //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie
            $this->findAllDirectors();                                                          //Etre redirigé sur la même page 
        }
    }

?>