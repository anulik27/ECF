<?php

class AnimalRepo {
    private PDO $con;

    public function __construct() {
        $this->con = PDO_N::getInstance();
        
    }

    public function getAll() {
        $stmt = $this->con->query("SELECT * FROM animal");
        $list = array();
        
        while($row = $stmt->fetch()) {
            $raceRepo = new RaceRepo();
            $race = $raceRepo->getById($row["race_id"]);
            array_push($list, new Animal($row["animal_id"], $row["prenom"], $row["etat"], $race, $row["habitat_id"]));
        }

        return $list;
    }

    public function getById($id) {
        $stmt = $this->con->prepare("SELECT * FROM animal WHERE animal_id = :id");
        $stmt->execute(['id' => $id]);

        $list = array();

        while($row = $stmt->fetch()) {
            $raceRepo = new RaceRepo();
            $race = $raceRepo->getById($row["race_id"]);
            array_push($list, new Animal($row["animal_id"], $row["surname"], $row["state"], $race, $row["habitat_id"]));
        }

        return $list;
    }

    public function add($data) {
        $raceRepo = new RaceRepo();
        $race_id = $raceRepo->add($data["race"]);
        
        $sql = "INSERT INTO animal (prenom, etat, race_id, habitat_id) VALUES (:surname, :state, :race_id, :habitat_id)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':surname', $data['surname']);
        $stmt->bindValue(':state', $data['state']);
        $stmt->bindValue(':race_id', $race_id);
        $stmt->bindValue(':habitat_id', $data['habitat_id']);
        $stmt->execute();
        return $this->con->lastInsertId();
    }

    public function update($data) {
        $sql = "UPDATE animal SET prenom = :surname, etat = :state, habitat_id = :habitat_id WHERE animal_id = :animal_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':surname', $data['surname']);
        $stmt->bindValue(':state', $data['state']);
        $stmt->bindValue(':habitat_id', $data['habitat_id']);
        $stmt->bindValue(':animal_id', $data["animal_id"]);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->con->prepare("DELETE FROM animal WHERE animal_id = :id");
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }
}
?>
