<?php

    require_once "bdd/DAO.php";

    class MovieController {

        public function findAllMovies(){                                                                         //Fonction pour afficher la liste des films

            $dao = new DAO();
            $sql = "SELECT f.id_film, f.titre  FROM film f";
            $films = $dao->executerRequete($sql);
            require "views/movie/listMovies.php"; 
        }

        public function detailMovie($idFilm){                                                                    //Fonction pour accéder au détails des films

            $dao = new DAO();

            ////////////////////////////////////////////////////////////Requête SQL1 INFORMATIONS FILM

            $sql = "SELECT f.titre, f.annee_sortie, f.duree, p.prenom, p.nom, f.affiche, f.note, f.synopsis, f.id_realisateur, f.id_film FROM film f, personne p, realisateur r
            WHERE f.id_realisateur = r.id_realisateur
            AND p.id_personne = r.id_personne
            
            AND f.id_film = :id" ;                                                                              //Pour empécher le piratage on met la clé dans un opérateur de solution de portée 

            $films = $dao->executerRequete($sql, [":id" => $idFilm]);                                           //Faire une requête préparée
            
            ////////////////////////////////////////////////////////////Requête SQL2 DISTRIBUTION
        
            $sql2 = "SELECT c.id_film, p.nom, p.prenom, c.id_acteur, ra.name, ra.firstname, ra.pseudo, ra.role_acteur FROM casting c
            INNER JOIN acteur a
            ON a.id_acteur = c.id_acteur
            INNER JOIN personne p
            ON p.id_personne = a.id_personne
            INNER JOIN role_acteur ra
            ON ra.role_acteur = c.role_acteur
    
            AND c.id_film = :id" ;
    
            $acteurs = $dao->executerRequete($sql2, [":id" => $idFilm]);

            ////////////////////////////////////////////////////////////Requête SQL3 GENRE

            $sql3 ="SELECT g.type, g.genre_film FROM film f, classer c, genre_film g
            WHERE c.genre_film = g.genre_film
            AND f.id_film = c.id_film
            AND f.id_film = :id" ;

            $genres = $dao->executerRequete($sql3, [":id" => $idFilm]);

            require "views/movie/detailMovie.php"; 

        }

        ///////////////////////////////////////////////////////////FORMULAIRE

        public function openFormulaireMovie(){                                                                  //Fonction pour accéder au formulaire
            
            $dao = new DAO();                                                                                   //Lier les réalisateurs aux films grâce à une requête SQL
            
            // $sql = "SELECT p.prenom, p.nom, p.id_personne
            // FROM personne p
            // INNER JOIN realisateur r
            // ON r.id_personne = p.id_personne
            // AND p.id_personne = :id" ; 
            
            // $realisateurs = $dao->executerRequete($sql, [":id" => $idFilm]);

            // while ($realisateur = $realisateur->fetch()){

            //     echo $realisateur["prenom"]." ";
            //     echo $realisateur["nom"]."<br>";
                
            // }

            require "views/movie/formulaireMovie.php"; 
        }

        public function addMovie($array){                                                                       //Fonction pour ajouter un nouveau film dans la base SQL via le formulaire
            
            $dao = new DAO();                                                                                   //Requête SQL INSERT INTO table(...) VALUES (...) pour ajouter un film, celui ci comprendra un titre, une année de sortie,...(Ajouter les inputs en conséquence dans formulaireMovie)

            $sql1 = "INSERT INTO film(titre, annee_sortie, duree, synopsis, note)                                                                              
            VALUES (:titre, :annee_sortie, :duree, :synopsis, :note)";                                          //Les names des inputs doivent correspondre respectivement aux variables $titre, $annee_sortie,...
            
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);                     //Mettre les filtres aux inputs pour éviter les injections SQL ou XSS
            $annee_sortie = filter_input(INPUT_POST, "annee_sortie", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            
            $ajout = $dao->executerRequete($sql1, ["titre" => $titre,"annee_sortie" => $annee_sortie,
            "duree" => $duree, "synopsis" => $synopsis, "note" => $note]);                                      //Pour éxecuter les requêtes SQL et renvoyer les valeurs respectives  

            $dernierID = $dao->getBDD()->lastInsertID();
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //Ajouter la requête SQL pour ajouter un réalisateur au film

            // $sql2 = "INSERT INTO realisateur(prenom, nom)                                                                              
            // VALUES (:prenom, :nom)";                                                                         //Les names des inputs doivent correspondre respectivement aux variables $titre, $annee_sortie,...
            
            // $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            // $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

            // $ajout = $dao->executerRequete($sql2, ["prenom" => $prenom,"nom" => $nom]);
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            //Pour afficher un message Flash à chaque ajout inscrire cette variable dans chaque partie

            $_SESSION['flash_message'] = $titre." "."a été ajouté avec succès !";                               
            $this->findAllMovies();                                                                             //Etre redirigé sur la même page  
        }
    }
?>