<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<figure>
    <img class= logo src="public/images/accueil.jpg" alt="symbole cinema">
</figure>

<div class="up">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2>Télécharger des images</h2><br>
        <input class="nameGenre" type="file" id="fileToUpload" name="fileToUpload">
        <input type="submit" value="Valider" name="submit">
    </form>
</div>

<?php
    $title = "Page d'accueil";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>