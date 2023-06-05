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

    //$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULLSPECIAL_CHARS);

    switch($_GET['action']){
        case 'listFilms': $movieCtrl->findAllFilms(); break; 
        case 'listActors': $personCtrl->findAllActors(); break;
        case 'listGenres': $genreCtrl->findAllGenres(); break;
        
    }
}
    else{

        $homeCtrl->homePage();                                      // Pour revenir sur la page d'accueil
    }


?>