<?php
Class Veterinaire(){
    $id;
    $date;
    $detail;

    public function __construct($id,$date,$detail){
        $this->id=$id;
        $this->date=$date;
        $this->detail=$detail;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id; 
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date; 
    }

    public function getDetail(){
        return $this->detail;
    }

    public function setDetail($detail){
        $this->detail = $detail; 
    }
}
?>