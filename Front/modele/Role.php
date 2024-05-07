<?php
Class Role(){
    $id;
    $label;

    public function __construct($id,$label){
        $this->id=$id;
        $this->label=$label;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id; 
    }

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($label){
        $this->label = $label; 
    }
}
?>