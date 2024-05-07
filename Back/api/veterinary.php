<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$rapportVeterinaireRepo = new RapportVeterinaireRepo();

if ($method == "GET") {
    if(!empty($_GET["animal_id"])) {
        $animal_id = $_GET["animal_id"];

        echo json_encode(
            ["response" => $rapportVeterinaireRepo->countForAnimal($animal_id)]
        );
    } else {
        $array = array();
        foreach ($rapportVeterinaireRepo->getAll() as $key => $value) {
            array_push($array, $value->json());
        }
    
        echo json_encode(
            ["response" => $array]
        );
    }
} elseif ($method == "POST") {
    $data = $_GET;

    echo json_encode(
        ["response" => $rapportVeterinaireRepo->add($data)]
    );
} elseif ($method == "PUT") {
    $data = $_GET;

    echo json_encode(
        ["response" => $rapportVeterinaireRepo->update($data)]
    );
} elseif ($method == "DELETE") {
    $rapport_veterinaire_id = $_GET['rapport_veterinaire_id'];

    echo json_encode(
        ["response" => $rapportVeterinaireRepo->delete($rapport_veterinaire_id)]
    );
} else {
    echo json_encode(["response" => "Bad request"]);
}
?>
