<?php

class Habitat {
    public $habitat_id;
    public $name;
    public $description;
    public $commentaire_habitat;
    public $image;

    public function __construct($habitat_id, $name, $description, $commentaire_habitat, $image) {
        $this->habitat_id = $habitat_id;
        $this->name = $name;
        $this->description = $description;
        $this->commentaire_habitat = $commentaire_habitat;
        $this->image = $image;
    }

    public function json(): array {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "commentaire_habitat" => $this->commentaire_habitat,
            "image" => $this->image,
            "habitat_id" => $this->habitat_id
        ];
    }
}

?>
