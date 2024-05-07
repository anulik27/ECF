<?php

class HabitatRepo {
    private PDO $con;

    public function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function add($data){
        $image = $data["image"];
        $imageRepo = new ImageRepo();
        $image_id = $imageRepo->add($image);

        $stmt = $this->con->prepare("INSERT INTO habitat(nom, description, commentaire_habitat, image_id) VALUES(:name, :description, :commentaire_habitat, :image_id)");
        $stmt->bindValue(':name', $data["name"]);
        $stmt->bindValue(':description', $data["description"]);
        $stmt->bindValue(':commentaire_habitat', $data["commentaire_habitat"]);
        $stmt->bindValue(':image_id', $image_id);
        return $stmt->execute();
    }

    public function get($habitat_id){
        $stmt = $this->con->prepare("SELECT * FROM habitat WHERE habitat_id = :habitat_id");
        $stmt->bindValue(':habitat_id', $habitat_id);
        $stmt->execute();

        $list = array();
        while($row = $stmt->fetch()) {
            $image_data = $imageRepo->getImageDataById($row["image_id"]);
            array_push($list, new Habitat($row["habitat_id"], $row["name"], $row["description"], $row["commentaire_habitat"], $image_data));
        }

        return $list;
    }

    public function update($data){
        $stmt = $this->con->prepare("UPDATE habitat SET nom = :name, description = :description, commentaire_habitat = :commentaire_habitat WHERE habitat_id = :habitat_id");
        $stmt->bindValue(':name', $data["name"]);
        $stmt->bindValue(':description', $data["description"]);
        $stmt->bindValue(':commentaire_habitat', $data["commentaire_habitat"]);
        $stmt->bindValue(':habitat_id', $data["habitat_id"]);
        return $stmt->execute();
    }

    public function delete($habitat_id){
        $stmt = $this->con->prepare("DELETE FROM habitat WHERE habitat_id = :habitat_id");
        $stmt->bindValue(':habitat_id', $habitat_id);
        return $stmt->execute();
    }

    public function getAll(){
        $stmt = $this->con->query("SELECT * FROM habitat");

        $list = array();
        while($row = $stmt->fetch()) {
            $imageRepo = new ImageRepo();
            $image_data = $imageRepo->getImageDataById($row["image_id"]);
            array_push($list, new Habitat($row["habitat_id"], $row["nom"], $row["description"], $row["commentaire_habitat"], $image_data));
        }

        return $list;
    }
}

?>
