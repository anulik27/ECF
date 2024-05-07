<?php

class Alimentation {
    public $alimentation_id;
    public $date;
    public $hours;
    public $food;
    public $quantity;
    public $animal_id;

    public function __construct($alimentation_id, $date, $hours, $food, $quantity, $animal_id) {
        $this->alimentation_id = $alimentation_id;
        $this->date = $date;
        $this->hours = $hours;
        $this->food = $food;
        $this->quantity = $quantity;
        $this->animal_id = $animal_id;
    }

    public function json(): array {
        return [
            "alimentation_id" => $this->alimentation_id,
            "date" => $this->date,
            "hours" => $this->hours,
            "food" => $this->food,
            "quantity" => $this->quantity,
            "animal_id" => $this->animal_id
        ];
    }
}

?>
