<?php
Class Avis{
    $id;
    $pseudo;
    $commentaire;
    $isVisible;

    public function __construct($id,$pseudo,$commentaire,$isVisible){
        $this->id=$id;
        $this->pseudo=$pseudo;
        $this->commentaire=$commentaire;
        $this->isVisible=$isVisible;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id; 
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo; 
    }

    public function getCommentaire(){
        return $this->commentaire;
    }

    public function setCommentaire($commentaire){
        $this->commentaire = $commentaire; 
    }

    public function getIsVisible(){
        return $this->isVisible;
    }

    public function setIsVisible($isVisible){
        $this->isVisible = $isVisible; 
    }
}
?>