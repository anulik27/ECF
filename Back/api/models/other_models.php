<?php

class Service {
    public $service_id;
    public $name;
    public $description;

    public function __construct($service_id, $name, $description) {
        $this->service_id = $service_id;
        $this->name = $name;
        $this->description = $description;
    }

    public function json(): array {
        return [
            "service_id" => $this->service_id,
            "name" => $this->name,
            "description" => $this->description
        ];
    }
}

class Avis {
    public $avis_id;
    public $pseudo;
    public $commentaire;
    public $is_visible;

    public function __construct($avis_id, $pseudo, $commentaire, $is_visible) {
        $this->avis_id = $avis_id;
        $this->pseudo = $pseudo;
        $this->commentaire = $commentaire;
        $this->is_visible = $is_visible;
    }

    public function json(): array {
        return [
            "avis_id" => $this->avis_id,
            "pseudo" => $this->pseudo,
            "commentaire" => $this->commentaire,
            "is_visible" => $this->is_visible
        ];
    }
}

?>