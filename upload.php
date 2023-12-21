<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Ce fichier est une image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Ce fichier n'est pas une image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Ce fichier existe déjà";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Image trop grande.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Seul les formats suivant: JPG, JPEG, PNG & GIF sont autorisés.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Fichier non téléchargé.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a été téléchargé avec succès.";
    } else {
        echo "Erreur lors du téléchargement.";
    }
    }
    
?>