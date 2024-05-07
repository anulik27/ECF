<?php

class Animal {
    public $animal_id;
    public $surname;
    public $state;
    public $race;
    public $habitat_id;

    public function __construct($animal_id, $surname, $state, $race, $habitat_id) {
        $this->animal_id = $animal_id;
        $this->surname = $surname;
        $this->state = $state;
        $this->race = $race;
        $this->habitat_id = $habitat_id;
    }

    public function json(): array {
        return [
            "animal_id" => $this->animal_id,
            "surname" => $this->surname,
            "state" => $this->state,
            "race" => $this->race,
            "habitat_id" => $this->habitat_id
        ];
    }
}

?>
