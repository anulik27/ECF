<?php
Class Utilisateur(){
    $username;
    $password;
    $nom;
    $prenom;

    public function __construct($username,$password,$nom,$prenom){
        $this->username=$username;
        $this->password=$password;
        $this->nom=$nom;
        $this->prenom=$prenom;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id= $id; 
    }

    public function getpassword(){
        return $this->password;
    }

    public function setpassword($password){
        $this->password = $password; 
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom; 
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom; 
    }
}
?>