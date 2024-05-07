<?php

class CommentaireRepo {
    private PDO $con;

    public function __construct() {
        $this->con = PDO_N::getInstance();
    }

    public function add($data) {
        $stmt = $this->con->prepare("INSERT INTO commentaire (commentaire, habitat_id) VALUES (:commentaire, :habitat_id)");
        $stmt->bindValue(':commentaire', $data['commentaire']);
        $stmt->bindValue(':habitat_id', $data['habitat_id']);
        
        if ($stmt->execute()) {
            return $this->con->lastInsertId(); 
        } else {
            return false;
        }
    }

    public function getAll() {
        $stmt = $this->con->query("SELECT * FROM commentaire");
        $list = [];

        while ($row = $stmt->fetch())
            array_push($list, new Commentaire($row['commentaire_id'], $row['commentaire'], $row['habitat_id']));

        return $list;
    }

    public function delete($commentaire_id) {
        $stmt = $this->con->prepare("DELETE FROM commentaire WHERE commentaire_id = :commentaire_id");
        $stmt->bindValue(':commentaire_id', $commentaire_id);
        return $stmt->execute();
    }
}

?>
