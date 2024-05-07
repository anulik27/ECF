<?php

class RoleRepo {
    private PDO $con;
    
    function __construct(){
        $this->con = PDO_N::getInstance();
    }

    public function get($label): array{
        if($label == "ADMIN")
            return [false, -1];

        $result = $this->con->query("SELECT * FROM role WHERE label='" . $label . "'");
        $list = array();
        $exist = false;
        $id = -1;
        while($row = $result->fetch()){
            $exist = true;
            $id = $row["role_id"];
        }
        
        return [$exist, $id];
    }

    public function getLabel($id){
        $result = $this->con->query("SELECT * FROM role WHERE role_id=" . $id);
        
        return $result->fetch()["label"];
    }
}



?>
