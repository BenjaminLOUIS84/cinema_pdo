<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Lien pour utiliser les fonctionnalités de BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Renvoi les différents titres respectifs de chaque rubriques sur l'onglet de la page -->
    <title><?= $title ?></title>
</head>
<body>
    <header>

        <nav>
            <ul>
                <!-- Les liens de navigation pour accéder aux différentes rubriques -->
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=listMovies">Films</a></li>
                <li><a href="index.php?action=listGenres">Genres</a></li>
                <li><a href="index.php?action=listActors">Acteurs</a></li>
                <li><a href="index.php?action=listRoles">Roles</a></li>
                <li><a href="index.php?action=listDirectors">Réalisateurs</a></li>
            </ul>
        </nav>   
    </header>

    <main>

        <div class="flash">
            <?php
                // Condition pour afficher sur la page concernée un message en cas de validation de l'ajout
                if(isset($_SESSION['flash_message'])) {   
                    $message = $_SESSION['flash_message'];
                    echo $message;
                    unset($_SESSION['flash_message']);
                }
            ?>
        </div>
        
        <!-- Renvoi les différents contenus respectifs de chaque rubriques -->
        <?= $content ?>
    </main>

    <footer>
        <span>Cinema ©2023 Make with love by Benjamin LOUIS</span>
    </footer>

    <!-- Lien pour utiliser les fonctionnalités de BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>