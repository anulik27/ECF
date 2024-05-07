<?php

class RaceRepo {
    private PDO $con;

    public function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function add($label){
        $stmt = $this->con->prepare("INSERT INTO race(label) VALUES(:label)");
        $stmt->bindValue(':label', $label);
        
        if ($stmt->execute()) {
            return $this->con->lastInsertId(); 
        } else {
            return 1;
        }
    }

    public function getById($race_id) {
        $stmt = $this->con->prepare("SELECT * FROM race WHERE race_id = :race_id");
        $stmt->bindValue(':race_id', $race_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["label"];
    }
}

?>
