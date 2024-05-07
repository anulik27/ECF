<?php

class AvisRepo {
    private PDO $con;
    
    function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function getAll(): array{
        // get all avis dispo
        $result = $this->con->query("SELECT * FROM avis");
        $list = array();
        while($row = $result->fetch())
            array_push($list, new Avis($row["avis_id"], $row["pseudo"], $row["commentaire"], $row["isVisible"]));
        return $list;
    }

    public function changeVisibility($data){
        $stmt = $this->con->prepare("UPDATE avis SET isVisible = :visible WHERE avis_id = :avis_id");
        $stmt->bindValue(':avis_id', $data["avis_id"]);
        $stmt->bindValue(':visible', $data["visibility"]);
        return $stmt->execute();
    }

    public function delete(int $avis_id){
        $stmt = $this->con->prepare("DELETE FROM avis WHERE avis_id = :avis_id");
        $stmt->bindValue(':avis_id', $avis_id);
        return $stmt->execute();
    }

    public function add($data){
        $stmt = $this->con->prepare("INSERT INTO avis(pseudo, commentaire, isVisible) VALUES(:pseudo, :commentaire, False)");
        $stmt->bindValue(':pseudo', $data["pseudo"]);
        $stmt->bindValue(':commentaire', $data["commentaire"]);
        return $stmt->execute();
    }
}



?>
