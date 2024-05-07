<?php

class ServiceRepo {
    private PDO $con;

    public function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function add($data){
        $stmt = $this->con->prepare("INSERT INTO service(nom, description) VALUES(:name, :description)");
        $stmt->bindValue(':name', $data["name"]);
        $stmt->bindValue(':description', $data["description"]);
        return $stmt->execute();
    }

    public function get($service_id){
        $stmt = $this->con->prepare("SELECT * FROM service WHERE service_id = :service_id");
        $stmt->bindValue(':service_id', $service_id);
        $stmt->execute();

        $list = array();
        while($row = $result->fetch())
            array_push($list, new Service($row["service_id"], $row["nom"], $row["description"]));

        return $list;
    }

    public function update($data){
        $stmt = $this->con->prepare("UPDATE service SET nom = :name, description = :description WHERE service_id = :service_id");
        $stmt->bindValue(':name', $data["name"]);
        $stmt->bindValue(':description', $data["description"]);
        $stmt->bindValue(':service_id', $data["service_id"]);
        return $stmt->execute();
    }

    public function delete($service_id){
        $stmt = $this->con->prepare("DELETE FROM service WHERE service_id = :service_id");
        $stmt->bindValue(':service_id', $service_id);
        return $stmt->execute();
    }

    public function getAll(){
        $stmt = $this->con->query("SELECT * FROM service");
        $list = array();
        while($row = $stmt->fetch()) {
            array_push($list, new Service($row["service_id"], $row["nom"], $row["description"]));
        }

        return $list;
    }
}

?>
