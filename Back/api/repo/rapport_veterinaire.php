<?php

class RapportVeterinaireRepo {
    private PDO $con;

    public function __construct() {
        $this->con = PDO_N::getInstance();
    }

    public function getAll() {
        $stmt = $this->con->query("SELECT * FROM rapport_veterinaire");
        $list = array();

        while ($row = $stmt->fetch()) {
            array_push($list, new RapportVeterinaire($row["rapport_veterinaire_id"], $row["date"], $row["detail"], $row["animal_id"], $row["utilisateur_id"]));
        }

        return $list;
    }

    public function countForAnimal($animal_id) {
        $stmt = $this->con->query("SELECT * FROM rapport_veterinaire WHERE animal_id=" . $animal_id);
        $result = $stmt->fetchAll();

        return count($result);
    }

    public function getById($id) {
        $stmt = $this->con->prepare("SELECT * FROM rapport_veterinaire WHERE rapport_veterinaire_id = :id");
        $stmt->execute(['id' => $id]);

        $list = array();

        while ($row = $stmt->fetch()) {
            array_push($list, new RapportVeterinaire($row["rapport_veterinaire_id"], $row["date"], $row["detail"], $row["animal_id"], $row["utilisateur_id"]));
        }

        return $list;
    }

    public function add($data) {
        $sql = "INSERT INTO rapport_veterinaire (date, detail, animal_id, utilisateur_id) VALUES (:date, :detail, :animal_id, :utilisateur_id)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':detail', $data['detail']);
        $stmt->bindValue(':animal_id', $data['animal_id']);
        $stmt->bindValue(':utilisateur_id', $data['utilisateur_id']);
        $stmt->execute();
        return $this->con->lastInsertId();
    }

    public function update($data) {
        $sql = "UPDATE rapport_veterinaire SET date = :date, detail = :detail WHERE rapport_veterinaire_id = :rapport_veterinaire_id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':detail', $data['detail']);
        $stmt->bindValue(':rapport_veterinaire_id', $data["rapport_veterinaire_id"]);

        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->con->prepare("DELETE FROM rapport_veterinaire WHERE rapport_veterinaire_id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}

?>
