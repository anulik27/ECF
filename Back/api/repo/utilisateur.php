<?php

class UtilisateurRepo {
    private PDO $con;
    
    function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function auth($data) {
        $stmt = $this->con->prepare("SELECT * FROM utilisateur WHERE username = :username AND password = :password");
        $stmt->bindValue(':username', $data["username"]);
        $stmt->bindValue(':password', sha1($data["password"]));
        $stmt->execute();

        if($stmt->rowCount() != 0) {
            $roleRepo = new RoleRepo();
            $role = $roleRepo->getLabel($stmt->fetch()["role_id"]);
            return $role;
        }
        
        return "NOT_FOUND";
    }

    public function add($data) {
        $roleRepo = new RoleRepo();
        $role = $roleRepo->get($data["role"]);

        if($role[0]) {
            $stmt = $this->con->prepare("INSERT INTO utilisateur(username, password, nom, prenom, role_id) VALUES(:username, :password, :name, :surname, :role_id)");
            $stmt->bindValue(':username', $data["username"]);
            $stmt->bindValue(':password', sha1($data["password"]));
            $stmt->bindValue(':name', $data["name"]);
            $stmt->bindValue(':surname', $data["surname"]);
            $stmt->bindValue(':role_id', $role[1]);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}



?>
