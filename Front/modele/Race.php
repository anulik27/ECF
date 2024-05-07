<?php
Class Race(){
    $id;
    $abel;

    public function __construct($id,$abel){
        $this->id=$id;
        $this->abel=$abel;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id; 
    }

    public function getAbel(){
        return $this->abel;
    }

    public function setAbel($abel){
        $this->abel = $abel; 
    }
}
?>