<?php

class PersonController {

    public function findAllActors(){
        require "views/actor/listActors.php"; 
    }

    public function findAllDirectors(){
        require "views/director/listDirectors.php"; 
    }

}

?>