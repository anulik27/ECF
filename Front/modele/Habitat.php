<?php
Class Habitat(){
    $id;
    $nom;
    $description;
    $commentaireHabitat;

    public function __construct($id,$nom,$description,$commentaireHabitat){
        $this->id=$id;
        $this->nom=$nom;
        $this->description=$description;
        $this->commentaireHabitat=$commentaireHabitat
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id; 
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom; 
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description; 
    }

    public function getCommentaireHbitat(){
        return $this->commentaireHabitat;
    }

    public function setCommentaireHbitat($commentaireHabitat){
        $this->commentaireHabitat = $commentaireHabitat; 
    }
}
?>