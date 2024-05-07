<?php

class ImageRepo {
    private PDO $con;

    public function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function add($imageData){
        $stmt = $this->con->prepare("INSERT INTO image(image_data) VALUES(:image_data)");
        $stmt->bindValue(':image_data', $imageData, PDO::PARAM_LOB); // PARAM_LOB est utilisé pour les grands objets binaires (BLOB)
        
        if ($stmt->execute()) {
            return $this->con->lastInsertId(); 
        } else {
            return 1; // une image par défaut
        }
    }

    public function getImageDataById($image_id) {
        $stmt = $this->con->prepare("SELECT image_data FROM image WHERE image_id = :image_id");
        $stmt->bindValue(':image_id', $image_id);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            return $result['image_data'];
        } else {
            return false; 
        }
    }
}

?>
