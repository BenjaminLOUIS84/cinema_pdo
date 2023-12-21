<?php
    // Démarrer la temporisation de sortie
    ob_start();
?>

<figure>
    <img class= logo src="public/images/accueil.jpg" alt="symbole cinema">
</figure>

<!-- Formulaire pour télécharger des images de n'importe où dans le dossier uploads -->

<div class="up">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3>Pour ajouter un nouveau film, acteur, réalisateur ou rôle</h3>
        <h2>Télécharger les images dont vous avez besoin</h2><br>
        <input class="nameGenre" type="file" id="fileToUpload" name="fileToUpload">
        <input type="submit" value="Valider" name="submit">
    </form>
</div>

<?php
    $title = "Page d'accueil";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>