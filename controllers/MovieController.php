<?php

    require_once "bdd/DAO.php";

    class MovieController {

        public function findAllMovies(){                                                                         // Fonction pour afficher la liste des films

            $dao = new DAO();                                                                                    // On instancie le DAO pour se connecter à la BDD
            $sql = "SELECT f.id_film, f.titre  FROM film f";
            $films = $dao->executerRequete($sql);
            require "views/movie/listMovies.php"; 
        }

        public function detailMovie($idFilm){                                                                    // Fonction pour accéder au détails des films

            $dao = new DAO();

            ////////////////////////////////////////////////////////////Requête SQL1 INFORMATIONS FILM

            $sql = "SELECT f.titre, f.annee_sortie, f.duree, p.prenom, p.nom, f.affiche, f.note, f.synopsis, f.id_realisateur, f.id_film FROM film f, personne p, realisateur r
            WHERE f.id_realisateur = r.id_realisateur
            AND p.id_personne = r.id_personne
            
            AND f.id_film = :id" ;                                                                              // Pour empécher le piratage on met la clé dans un opérateur de solution de portée 

            $films = $dao->executerRequete($sql, [":id" => $idFilm]);                                           // Faire une requête préparée
            
            ////////////////////////////////////////////////////////////Requête SQL2 DISTRIBUTION
        
            $sql2 = "SELECT c.id_film, p.nom, p.prenom, c.id_acteur, ra.name, ra.firstname, ra.pseudo, ra.role_acteur FROM casting c
            INNER JOIN acteur a
            ON a.id_acteur = c.id_acteur
            INNER JOIN personne p
            ON p.id_personne = a.id_personne
            INNER JOIN role_acteur ra
            ON ra.role_acteur = c.role_acteur
    
            AND c.id_film = :id" ;
    
            $acteurs = $dao->executerRequete($sql2, [":id" => $idFilm]);                                        // Cas particuliers Définir deux variables dans le controlleur pour autoriser l'utlisation de plusieurs variables dans la view détailMovie
            $roles = $dao->executerRequete($sql2, [":id" => $idFilm]);

            ////////////////////////////////////////////////////////////Requête SQL3 GENRE

            $sql3 ="SELECT g.type, g.id_genre FROM film f, classer c, genre g
            WHERE c.id_genre = g.id_genre
            AND f.id_film = c.id_film
            AND f.id_film = :id" ;

            $genres = $dao->executerRequete($sql3, [":id" => $idFilm]);

            require "views/movie/detailMovie.php"; 

        }

        ///////////////////////////////////////////////////////////FORMULAIRE

        public function openFormulaireMovie(){                                                                  // Fonction pour accéder au formulaire
            
            $dao = new DAO();                                                                                   // Lier les réalisateurs, les genres et les castings aux films grâce aux requêtes SQL
            
            $sql = "SELECT p.prenom, p.nom, r.id_realisateur
            FROM personne p
            INNER JOIN realisateur r
            ON r.id_personne = p.id_personne
            ORDER BY nom ASC";                                                                          

            $realisateurs = $dao->executerRequete($sql);                                                        // Requête SQL SELECT pour Sélectionner les réalisateurs et la variable pour éxecuter la requête                                                      
    
            $sql2 = "SELECT p.nom, p.prenom, a.id_acteur
            FROM personne p
            INNER JOIN acteur a
            ON p.id_personne = a.id_personne
            ORDER BY nom ASC";
            
            $acteurs = $dao->executerRequete($sql2);                                                            // Requête SQL SELECT pour Sélectionner les acteurs et la variable pour éxecuter la requête

            $sql3 = "SELECT ra.role_acteur, ra.firstname, ra.name, ra.pseudo
            FROM role_acteur ra
            ORDER BY ra.name ASC";
    
            $roles = $dao->executerRequete($sql3);                                                              // Requête SQL SELECT pour Sélectionner les rôles et la variable pour éxecuter la requête

            $sql4 = "SELECT g.type, g.id_genre
            FROM genre g
            ORDER BY type ASC";

            $genres = $dao->executerRequete($sql4);                                                             // Requête SQL SELECT pour Sélectionner les genres et la variable pour éxecuter la requête
            
            require "views/movie/formulaireMovie.php"; 
        }

        public function addMovie($array){                                                                       // Fonction pour ajouter un nouveau film dans la base SQL via le formulaire
            
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);                     // Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $annee_sortie = filter_input(INPUT_POST, "annee_sortie", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

            $id_realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_VALIDATE_INT);                  // Récupération de l'id_realisateur pour la jonction
            
            $id_acteur = filter_input(INPUT_POST, "id_acteur", FILTER_VALIDATE_INT);                            // Récupération de l'id_acteur pour la jonction
            $role_acteur = filter_input(INPUT_POST, "role_acteur", FILTER_VALIDATE_INT);                        // Récupération de le role_acteur pour la jonction
            
            $id_genres = filter_var_array($array['id_genre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);              // FILTER VAR ARRAY POUR LA SELECTION MULTIPLE DES GENRES id_genre deviendra un array

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //Ajouter les requêtes SQL pour ajouter les réalisateurs les castings et les genres aux films
            
            $dao = new DAO();                                                                                   // Requête SQL INSERT INTO table(...) VALUES (...) pour ajouter un film, celui ci comprendra un titre, une année de sortie,...(Ajouter les inputs en conséquence dans formulaireMovie)

            $sql1 = "INSERT INTO film(titre, annee_sortie, duree, synopsis, note, id_realisateur)                                                                              
            VALUES (:titre, :annee_sortie, :duree, :synopsis, :note, :id_realisateur)";                       
            
            $sql2 = "INSERT INTO classer(id_genre, id_film)                                                                              
            VALUES (:id_genre, :id_film)";                                                                      // Requête nécessaire pour lier un genre à un film (Pour supprimer un film il faudra supprimer d'abord cette liaison)                                                                      
           
            $sql3 = "INSERT INTO casting(id_film, id_acteur, role_acteur)                                                                              
            VALUES (:id_film, :id_acteur, :role_acteur)";                                                        // Les names des inputs doivent correspondre respectivement aux variables $titre, $annee_sortie,...

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //Ajouter les variables pour autoriser l'éxecution des requêtes SQL
            
            $ajouterFilm = $dao->executerRequete($sql1, ["titre" => $titre,"annee_sortie" => $annee_sortie,
            "duree" => $duree, "synopsis" => $synopsis, "note" => $note, "id_realisateur" => $id_realisateur]); // Pour éxecuter les requêtes SQL et renvoyer les valeurs respectives  

            $id_new_film = $dao->getBDD()->lastInsertId();                                                      // Récupèrer l'ID auto incrémenté qui s'est créé lors de l'ajout du film  

            foreach ($id_genres as $id_genre){
            
                $ajouterGenre = $dao->executerRequete($sql2, ["id_genre" => $id_genre, "id_film" => $id_new_film]);
            }

            $ajouterCasting = $dao->executerRequete($sql3, ["id_film" => $id_new_film, "id_acteur" => $id_acteur, "role_acteur" => $role_acteur]);
    
            //Pour afficher un message Flash à chaque ajout de film inscrire cette variable dans chaque partie

            $_SESSION['flash_message'] = $titre." "."a été ajouté avec succès !";                               
            $this->findAllMovies();                                                                             // Etre redirigé sur la même page  
        
            //$this->detailMovie($id_new_film); Pour afficher directement le détail du nouveau film 
        }
    }
?>