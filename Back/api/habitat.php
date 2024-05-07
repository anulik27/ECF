<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$habitatRepo = new HabitatRepo();

if ($method == "GET") {
    $array = array();

    foreach ($habitatRepo->getAll() as $key => $value) {
        array_push($array, $value->json());
    }

    echo json_encode(
        ["response" => $array]
    );

} elseif ($method == "POST") {
    $data = $_POST;

    echo json_encode(
        ["response" => $habitatRepo->add($data)]
    );

} elseif ($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);;

    echo json_encode(
        ["response" => $habitatRepo->update($data)]
    );

} elseif ($method == "DELETE") {
    $habitat_id = $_GET['habitat_id'];
    
    echo json_encode(
        ["response" => $habitatRepo->delete($habitat_id)]
    );
    
} else {
    echo json_encode(["response" => "Bad request"]);
}
?>
