<!-- DEFINITIONS

DAO Data Accès Object Patron de conception utilisé dans les architectures logicielles objet, regroupe les accès aux données persistantes dans des classes à part plutôt que de les disperser.
PDO PHP Data Object Pour dialoguer avec MySQL depuis PHP constitue une couche d'abstraction qui intervient entre l'application PHP et un système de gestion de base de données (SGDB) tel que MySQL, PostgreSQL ou MariaDB par exemple. 
PDO::query — Prépare et Exécute une requête SQL sans marque substitutive
PDO::prepare — Prépare une requête à l'exécution et retourne un objet
-->

<?php

    class DAO{

        private $bdd;

        public function __construct(){

            $this->bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
        }

        function getBDD(){
            
            return $this->bdd;
        }

        public function executerRequete($sql, $params = NULL){

            if ($params == NULL){
                $resultat = $this->bdd->query($sql);
            
            }else{
                $resultat = $this->bdd->prepare($sql);
                $resultat->execute($params);
            }
            return $resultat;

        }
    }

?>