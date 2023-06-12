<?php
ob_start();
?>

<a class ="detail" href="./index.php">Retour</a>

<h2><!--Le film<?=$_POST[('titre')]?> -->
    Ajouté avec Succès
</h2>

<?php
    $title = "Film ajouté";
    $content = ob_get_clean();  // Récupérer et afficher puis nettoyer la mémoire tampon
    require "views/template.php";
?>