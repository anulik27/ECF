<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$serviceRepo = new ServiceRepo();

if($method == "GET") {
    $array = array();
    foreach ($serviceRepo->getAll() as $key => $value) {
        array_push($array, $value->json());
    }

    echo json_encode(
        ["response" => $array]
    );

} else if($method == "POST") {
    $data =  $_POST;

    echo json_encode(
        ["response" => $serviceRepo->add($data)]
    );

} else if($method == "DELETE") {
    $service_id = $_GET["service_id"];

    echo json_encode(
        ["response" => $serviceRepo->delete($service_id)]
    );

} else if($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);

    $service_id = $data["service_id"];

    echo json_encode(
        ["response" => $serviceRepo->update($data)]
    );
} else {
    echo json_encode(
        ["response" => "Bad request"]
    );
}

?>
