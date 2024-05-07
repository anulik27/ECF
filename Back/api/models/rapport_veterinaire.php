<?php

class RapportVeterinaire {
    public $rapport_veterinaire_id;
    public $etat;
    public $nourriture;
    public $grammage;
    public $date;
    public $detail;
    public $animal_id;
    public $utilisateur_id;

    public function __construct($rapport_veterinaire_id, $etat, $nourriture, $grammage, $date, $detail, $animal_id, $utilisateur_id) {
        $this->rapport_veterinaire_id = $rapport_veterinaire_id;
        $this->etat = $etat;
        $this->nourriture = $nourriture;
        $this->grammage = $grammage;
        $this->date = $date;
        $this->detail = $detail;
        $this->animal_id = $animal_id;
        $this->utilisateur_id = $utilisateur_id;
    }

    public function json(): array {
        return [
            "rapport_veterinaire_id" => $this->rapport_veterinaire_id,
            "etat" => $this->etat,
            "nourriture" => $this->nourriture,
            "grammage" => $this->grammage,
            "date" => $this->date,
            "detail" => $this->detail,
            "animal_id" => $this->animal_id,
            "utilisateur_id" => $this->utilisateur_id
        ];
    }
}

?>
