<?php

class Utilisateur {
    public $username; // Email
    public $password;
    public $name;
    public $surname;
    public $role; // VETERINARY | EMPLOYE | ADMIN

    public function json(): array {
        return [
            "username" => $this->username,
            "name" => $this->$name,
            "surname" => $this->surname,
            "role" => $this->role
        ];
    }

}

?>