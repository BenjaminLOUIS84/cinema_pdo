<?php

    // Je demande l'accès aux fichiers physiques soit j'utilise un autoloader

    require_once "controllers/HomeController.php";
    require_once "controllers/PersonController.php";
    require_once "controllers/GenreController.php";
    require_once "controllers/MovieController.php";
    require_once "controllers/RoleController.php";

    // Je créer des instances des controlleurs

    $homeCtrl = new HomeController();
    $personCtrl = new PersonController();
    $genreCtrl = new GenreController();
    $movieCtrl = new MovieController();
    $roleCtrl = new RoleController();
    
    
    // L'index va intercepter la requête HTTP et va orienter vers le bon contrôleur et la bonne méthode

    // Exemple de requête HTTP: index.php?ctrl=action=listFilms

    if(isset($_GET['action'])){

        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //Mettre un filtre pour la sécurité
    
        switch($_GET['action']){
            
            //Afficher les listes 

            case 'listMovies': $movieCtrl->findAllMovies(); break; 
            case 'listActors': $personCtrl->findAllActors(); break;
            case 'listGenres': $genreCtrl->findAllGenres(); break;
            case 'listRoles': $roleCtrl->findAllRoles(); break;
            case 'listDirectors': $personCtrl->findAllDirectors(); break;
        
            //Afficher les détails 

            case 'detailMovie': $movieCtrl->detailMovie($_GET['idFilm']); break;
            case 'detailGenre': $genreCtrl->detailGenre($_GET['idGenre']); break;
            case 'detailActor': $personCtrl->detailActor($_GET['idActor']); break;
            case 'detailDirector': $personCtrl->detailDirector($_GET['idDirector']); break;
            case 'detailRole': $roleCtrl->detailRole($_GET['idRole']); break;
            
            //Afficher d'autres détails

            case 'filmographyDirector': $personCtrl->filmographyDirector($_GET['idDirector']); break;  
            case 'filmographyActor': $personCtrl->filmographyActor($_GET['idActor']); break;  
            
            //Modifier les données

            case 'formulaireMovie': $movieCtrl->openFormulaireMovie(); break;
            case 'addMovie': $movieCtrl->addMovie($_POST); break;
            case 'formulaireGenre': $genreCtrl->openFormulaireGenre(); break;
            case 'addGenre': $genreCtrl->addGenre($_POST); break;

        }
    }

    else{

        // Pour revenir sur la page d'accueil

        $homeCtrl->homePage();  
    }


?>