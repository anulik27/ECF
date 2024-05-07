<?php

class AlimentationRepo {
    private PDO $con;

    public function __construct() {
        $this->con = PDO_N::getInstance();
    }

    public function add($data) {
        $stmt = $this->con->prepare("INSERT INTO alimentation (date, hours, food, quantity, animal_id) VALUES (:date, :hours, :food, :quantity, :animal_id)");
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':hours', $data['hours']);
        $stmt->bindValue(':food', $data['food']);
        $stmt->bindValue(':quantity', $data['quantity']);
        $stmt->bindValue(':animal_id', $data['animal_id']);
        
        if ($stmt->execute()) {
            return $this->con->lastInsertId(); 
        } else {
            return false;
        }
    }

    public function getAll() {
        $stmt = $this->con->query("SELECT * FROM alimentation");
        $list = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($list, new Alimentation($row['alimentation_id'], $row['date'], $row['hours'], $row['food'], $row['quantity'], $row['animal_id']));
        }

        return $list;
    }

    public function delete($alimentation_id) {
        $stmt = $this->con->prepare("DELETE FROM alimentation WHERE alimentation_id = :alimentation_id");
        $stmt->bindValue(':alimentation_id', $alimentation_id);
        return $stmt->execute();
    }
}

?>
