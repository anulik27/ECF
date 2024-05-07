<?php

class Commentaire {
    public $commentaire_id;
    public $commentaire;
    public $habitat_id;

    public function __construct($commentaire_id, $commentaire, $habitat_id) {
        $this->commentaire_id = $commentaire_id;
        $this->commentaire = $commentaire;
        $this->habitat_id = $habitat_id;
    }

    public function json(): array {
        return [
            "commentaire_id" => $this->commentaire_id,
            "commentaire" => $this->commentaire,
            "habitat_id" => $this->habitat_id
        ];
    }
}

?>
